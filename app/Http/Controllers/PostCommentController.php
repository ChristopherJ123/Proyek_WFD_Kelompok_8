<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PostCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Topic $topic, Post $post)
    {
        $request->validate([
            'parent_message_id' => 'nullable|numeric',
            'message' => 'required|string',
            'images' => 'nullable|array|max:4',
            'images.*' => [
                File::image()
                    ->extensions('png,jpg,jpeg')
                    ->max(4096)
            ],
        ]);

        $comment = new PostComment();
        $comment->author_id = $request->user()->id;
        $comment->parent_message_id = $request->parent_message_id;
        $comment->post_id = $post->id;
        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('topics.posts.comments.show', [$topic, $post, $comment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Topic $topic, Post $post, PostComment $comment)
    {
        return view('post', [
            'search' => $request->search,
            'topic' => $topic,
            'post' => $post,
            'comment' => $comment,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic, Post $post, PostComment $comment)
    {
        $comment->delete();

        return redirect()->route('topics.posts.show', [$topic, $post]);
    }

    public function markAsAnswer(Topic $topic, Post $post, PostComment $comment) {
        if (auth()->id() !== $post->author->id) {
            abort(403);
        }

        PostComment::where('post_id', $post->id)->update(['is_answer' => false]);

        $comment->is_answer = true;
        $comment->save();

        // dd($comment);

       return back()->with('success', 'Marked as answer.');
    }



}