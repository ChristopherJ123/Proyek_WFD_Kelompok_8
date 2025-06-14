<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Topic;
use App\Models\UserTopicFollowing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        //
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

        $request->validate([
            'genre' => 'required|string',
            'title' => 'required|string|regex:/^\S+$/',
            'description' => 'required|string',
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
            'rules' => 'required|array|min:1',
            'rules.*.order' => 'required|numeric|max:20',
            'rules.*.title' => 'required|string|max:255',
            'rules.*.description' => 'nullable|string|max:1000',
        ], [
            'title.regex' => 'Topic Name must not contain spaces.'
        ]);

        $topic = new Topic();
        $topic->owner_id = $user;
        $topic->genre_id = $request->genre;
        $topic->name = $request->title;
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

            return view('topic', [
                'search' => $request->search,
                'sortBy' => $request->sort_by,
                'orderBy' => $request->order_by,
                'topic' => $topic,
                'isFollowing' => $user->topicFollowings()->where('topic_id', '=', $topic->id)->exists(),
                'posts' => $posts,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
