<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPostReport;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function reportPost(Request $request, $postId)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'reason' => 'required|string|max:255',
        ]);

        $existing = UserPostReport::where('user_id', Auth::id())
            ->where('post_id', $postId)
            ->whereNull('post_comment_id')
            ->first();

        if ($existing) {
            return response()->json(['message' => 'You have already reported this post.'], 400);
        }

        UserPostReport::create([
            'user_id' => Auth::id(),
            'post_id' => $postId,
            'post_comment_id' => null,
            'report_reason' => $validated['reason'],
        ]);

        return response()->json(['message' => 'Post reported successfully.']);
    }

    public function reportComment(Request $request, $commentId)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'post_comment_id' => 'required|exists:post_comments,id',
            'reason' => 'required|string|max:255',
        ]);

        $existing = UserPostReport::where('user_id', Auth::id())
            ->where('post_comment_id', $commentId)
            ->first();

        if ($existing) {
            return response()->json(['message' => 'You have already reported this comment.'], 400);
        }


        UserPostReport::create([
            'user_id' => Auth::id(),
            'post_id' => $validated['post_id'],
            'post_comment_id' => $validated['post_comment_id'],
            'report_reason' => $validated['reason'],
        ]);

        return response()->json(['message' => 'Comment has been reported.']);
    }
}
