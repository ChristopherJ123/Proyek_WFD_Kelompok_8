<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class TopicController extends Controller
{
    public function followTopic(Request $request, int $topic_id)
    {
        $user = $request->user();

        $alreadyFollowing = $user->topicFollowings()->where('topic_id', '=', $topic_id)->exists();

        if ($alreadyFollowing) {
            $user->topicFollowings()->detach($topic_id);
            $isFollowing = false;
        } else {
            $user->topicFollowings()->attach($topic_id);
            $isFollowing = true;
        }

        return response()->json([
            'is_following' => $isFollowing,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return redirect()->route('popular');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('register-topic', [
            'genres' => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user()->id;

        $request['name'] = str_replace(' ', '_', $request->name);

        $request->validate([
            'genre' => 'required|string',
            'name' => 'required|unique:topics|string|max:64|regex:/^[a-zA-Z0-9_-]+$/',
            'description' => 'required|string|max:255',
            'icon' => [
                'nullable',
                File::image()
                    ->extensions('png,jpg,jpeg,webp')
                    ->max(4096)
            ],
            'banner' => [
                'nullable',
                File::image()
                    ->extensions('png,jpg,jpeg,webp')
                    ->max(4096)
            ],
            'rules' => 'required|array|min:1|max:20',
            'rules.*.order' => 'required|numeric|max:20',
            'rules.*.title' => 'required|string|max:255',
            'rules.*.description' => 'nullable|string|max:1000',
            'moderators' => 'nullable|array',
            'moderators.*' => 'required|string',
        ], [
            'name.regex' => 'The topic name may only contain letters, numbers, underscores, or dashes.'
        ]);

        $topic = new Topic();
        $topic->owner_id = $user;
        $topic->genre_id = $request->genre;
        $topic->name = $request->name;
        $topic->description = $request->description;
        if ($request->hasFile('icon')) {
            $extension = $request->icon->extension();
            $topic->icon_image_link = $request->icon->storeAs('images/topic_icons', $topic->name . '.' . $extension, 'public');
        }
        if ($request->hasFile('banner')) {
            $extension = $request->banner->extension();
            $topic->banner_image_link = $request->banner->storeAs('images/topic_banners', $topic->name . '.' . $extension, 'public');
        }
        $topic->save();

        foreach ($request->rules as $rule) {
            $topic->rules()->create([
                'order' => $rule['order'],
                'title' => $rule['title'],
                'description' => $rule['description'],
            ]);
        }

        if (filled($request->moderators)) {
            foreach ($request->moderators as $moderator) {
                $moderatorUserExists = User::where('username', '=', $moderator)->first();
                if ($moderatorUserExists) {
                    $topic->moderators()->attach($moderatorUserExists->id);
                }
            }
        }

        // Owner follows the topic automatically
        $topic->followers()->attach($topic->owner_id);
        // Owner becomes the topic moderator automatically
        $topic->moderators()->attach($topic->owner_id);

        return redirect()->route('topics.show', $topic);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Topic $topic)
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort_by' => 'nullable|string',
            'order_by' =>'nullable|string',
        ]);

        $postsBuilder = $topic->posts()
            ->when($request->search, function (Builder $query, string $search) {
                $query->where('title', 'like', '%'.$search.'%');
            });

        match ($request->sort_by) {
            default => $postsBuilder
                ->select('*')
                ->selectRaw('
                    CASE
                        WHEN
                            (SELECT COUNT(*) FROM user_votes WHERE user_votes.post_id = posts.id AND is_upvote = 1) = 0 AND
                            (SELECT COUNT(*) FROM user_votes WHERE user_votes.post_id = posts.id AND is_upvote = 0) = 0
                        THEN 0
                        WHEN
                            (SELECT COUNT(*) FROM user_votes WHERE user_votes.post_id = posts.id AND is_upvote = 0) = 0
                        THEN
                            (SELECT COUNT(*) FROM user_votes WHERE user_votes.post_id = posts.id AND is_upvote = 1)
                        ELSE
                            (SELECT COUNT(*) FROM user_votes WHERE user_votes.post_id = posts.id AND is_upvote = 1) /
                            (SELECT COUNT(*) FROM user_votes WHERE user_votes.post_id = posts.id AND is_upvote = 0)
                    END as votes_ratio
                ')
                ->orderBy('votes_ratio', $request->order_by ?? 'desc'),
            'Popular' => $postsBuilder
                ->select('*')
                ->selectRaw('
                            (
                                SELECT COUNT(*)
                                FROM user_votes
                                WHERE user_votes.post_id = posts.id AND is_upvote = 1
                            ) -
                            (
                                SELECT COUNT(*)
                                FROM user_votes
                                WHERE user_votes.post_id = posts.id AND is_upvote = 0
                            ) AS votes_delta
                        ')
                ->orderBy('votes_delta', $request->order_by ?? 'desc'),
            'Date' => $postsBuilder
                ->select('*')
                ->orderBy('created_at', $request->order_by ?? 'desc'),
        };

        $posts = $postsBuilder->with(['topic', 'author'])->paginate(20);

        if (Auth::check()) {
            $user = $request->user();

            $topic->usersVisited()->syncWithoutDetaching($user['id']);
            $topic->usersVisited()->updateExistingPivot($user['id'], [
                'updated_at' => now(),
            ]);
        }

        return view('topic', [
            'search' => $request->search,
            'sortBy' => $request->sort_by,
            'orderBy' => $request->order_by,
            'topic' => $topic,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        $genres = Genre::all();

        return view('edit-topic', compact('topic', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        Gate::authorize('update', $topic);

        $data = $request->validate([
            'genre'          => ['required','integer','exists:genres,id'],
            'name'           => ['required',
                Rule::unique('topics','name')->ignore($topic->id),
                'string','max:64','regex:/^\S+$/'],
            'description'    => ['required','string','max:255'],
            'icon'           => ['nullable', File::image()->extensions(['png','jpg','jpeg','webp'])->max(4096)],
            'banner'         => ['nullable', File::image()->extensions(['png','jpg','jpeg','webp'])->max(4096)],
            'rules'          => ['required','array','min:1','max:20'],
            'rules.*.id'         => ['nullable','integer','exists:rules,id'],
            'rules.*.order'      => ['required','integer','max:20'],
            'rules.*.title'      => ['required','string','max:255'],
            'rules.*.description'=> ['nullable','string','max:1000'],
            'moderators'     => ['nullable','array'],
            'moderators.*'   => ['required','string'],
        ], [
            'name.regex' => 'Topic Name must not contain spaces.'
        ]);

        DB::transaction(function () use ($topic, $data, $request) {

            /* ---------- Core topic fields ---------- */
            $topic->fill([
                'genre_id'    => $data['genre'],
                'name'        => $data['name'],
                'description' => $data['description'],
            ]);

            /* ---------- File uploads (delete old first) ---------- */
            foreach (['icon' => 'icon_image_link', 'banner' => 'banner_image_link'] as $field => $column) {
                if ($request->hasFile($field)) {
                    // Optionally delete the previous file
                    if ($topic->$column) {
                        Storage::disk('public')->delete($topic->$column);
                    }
                    $ext               = $request->$field->extension();
                    $filename          = Str::slug($topic->name).".$ext";
                    $topic->$column    = $request->$field
                        ->storeAs("images/topic_{$field}s", $filename, 'public');
                }
            }

            $topic->save();

            /* ---------- Rules (diff + upsert pattern) ---------- */
            $incoming     = collect($data['rules']);
            $incomingIds  = $incoming->pluck('id')->filter();   // existing rule IDs

            // delete removed
            $topic->rules()->whereNotIn('id', $incomingIds)->delete();

            // update or create
            foreach ($incoming as $rule) {
                $topic->rules()->updateOrCreate(
                    ['id' => $rule['id'] ?? null],
                    Arr::only($rule, ['order','title','description'])
                );
            }

            /* ---------- Moderators ---------- */
            if (!empty($data['moderators'])) {
                $moderatorIds = User::whereIn('username', $data['moderators'])
                    ->where('username','!=',$topic->owner->username)
                    ->pluck('id');
                $topic->moderators()->sync($moderatorIds);
            }
        });

        return redirect()->route('topics.show', $topic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        Gate::authorize('delete', $topic);

        $topic->delete();

        return redirect()->route('dashboard')->with('success', 'Topic deleted succesfully');
    }
}
