<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use App\Models\Topic;
use App\Models\UserVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    public function vote(Request $request, Post $post)
    {
        $user = $request->user();

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
    public function create()
    {
        $genres = Genre::all();

        if (Auth::check()) {
            $user = Auth::user();

            return view('register-topic', [
                'userTopicFollowings' => $user->topicFollowings()->get(),
                'recentlyVisitedTopics' => $user->topicsVisited()->latest()->get(),
                'genres' => $genres,
            ]);
        }

        return view('register-post-mockup', [
            'genres' => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'images.*' => [
                'nullable',
                File::image()
                    ->extensions('png,jpg,jpeg')
                    ->min(128)
                    ->max(4096)
            ],
        ]);    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic, Post $post)
    {
        //
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
