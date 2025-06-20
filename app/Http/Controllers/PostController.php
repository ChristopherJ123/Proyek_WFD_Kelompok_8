<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Topic;
use App\Models\UserVote;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    public function vote(Request $request, Post $post)
    {
        $user = $request->user();
        if ($user->isBannedFromTopic($post->topic_id)) {
        return response()->json(['message' => 'You are banned from voting in this topic.'], 403);
    }

        $request->validate([
            'post_comment_id' => 'nullable|numeric',
            'is_upvote' => 'required|boolean',
        ]);

        $voteExists = $user->votes()->where([
            'post_id' => $post->id,
            'post_comment_id' => $request->post_comment_id,
            'is_upvote' => $request->is_upvote,
        ])->first();

        if ($voteExists) {
            $voteExists->delete();
        } else {
            $user->votes()->updateOrCreate([
                'post_id' => $post->id,
                'post_comment_id' => $request->post_comment_id,
            ], [
                'is_upvote' => $request->is_upvote,
            ]);
        }

        if ($request->filled('post_comment_id')) {
            $comment = PostComment::find($request->post_comment_id);
            return response()->json([
                'upvote_count' => $comment->votes()->where('is_upvote', true)->count(),
                'downvote_count' => $comment->votes()->where('is_upvote', false)->count(),
            ]);
        }

        return response()->json([
            'upvote_count' => $post->votes()->where('is_upvote', '=', true)->count(),
            'downvote_count' => $post->votes()->where('is_upvote', '=', false)->count(),
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
    public function create(Topic $topic)
    {
        if (auth()->user()->isBannedFromTopic($topic->id)) {
            return redirect()->route('topics.show', $topic)->withErrors(['message' => 'You are banned from this topic.']);
        }
        $genres = Genre::all();

        return view('register-post', [
            'topic' => $topic,
            'genres' => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Topic $topic)
    {
        if ($request->user()->isBannedFromTopic($topic->id)) {
            return redirect()->back()->withErrors(['message' => 'You are banned from posting in this topic.']);
        }
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'images' => 'nullable|array|max:4',
            'images.*' => [
                'nullable',
                File::image()
                    ->extensions('png,jpg,jpeg')
                    ->max(4096)
            ],
        ]);

        $post = new Post();
        $post->author_id = $request->user()->id;
        $post->topic_id = $topic->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $extension = $image->extension();
                $filename = "{$topic->name}_{$post->id}_$index.$extension";
                $path = $image->storeAs('images/post_images', $filename, 'public');

                $post->images()->create([
                    'image_link' => $path
                ]);
            }
        }

        return redirect()->route('topics.posts.show', [$topic, $post]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Topic $topic, Post $post)
    {
        $comments = PostComment::where('post_id', $post->id)
            ->whereNull('parent_message_id')
            ->with('childrenRecursive')
            ->orderBy('created_at')
            ->get();

        if (Auth::check()) {
            $user = $request->user();

            $topic->usersVisited()->syncWithoutDetaching($user['id']);
            $topic->usersVisited()->updateExistingPivot($user['id'], [
                'updated_at' => now(),
            ]);
        }

        $isBanned = false;

        if (Auth::check()) {
            $user = $request->user();
            $isBanned = $user->isBannedFromTopic($topic->id);

            $topic->usersVisited()->syncWithoutDetaching($user['id']);
            $topic->usersVisited()->updateExistingPivot($user['id'], [
                'updated_at' => now(),
            ]);
        }

        return view('post', [
            'search' => $request->search,
            'topic' => $topic,
            'post' => $post,
            'comments' => $comments,
            'isBanned' => $isBanned,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
