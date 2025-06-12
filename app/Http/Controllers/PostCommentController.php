<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PostCommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|numeric',
            'parent_message_id' => 'nullable|numeric',
            'message' => 'required|string',
            'images.*' => [
                'nullable',
                File::image()
                    ->extensions('png,jpg,jpeg')
                    ->min(128)
                    ->max(4096)
            ],
        ]);

        $comment = new PostComment();
        $comment->author_id = $request->user()->id;
        $comment->parent_message_id = $request->parent_message_id;
        $comment->post_id = $request->post_id;
        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('posts.comments.show');
    }
}
