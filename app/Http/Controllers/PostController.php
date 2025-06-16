<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
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
            'upvote_count' => $post->votes()->where([['is_upvote', '=', true], ['post_comment_id', '=', $request->post_comment_id]])->count(),
            'downvote_count' => $post->votes()->where([['is_upvote', '=', false], ['post_comment_id', '=', $request->post_comment_id]])->count(),
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
                $filename = "{$topic->name}_{$post->id}_{$index}.$extension";
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
        return view('post', [
            'search' => $request->search,
            'topic' => $topic,
            'post' => $post,
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
