<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\UserVote;
use App\Models\DirectMessage;

class NotificationController extends Controller {
    public function index() {
    $userId = auth()->id();

    $comments = PostComment::with(['post.topic', 'author', 'parent'])
        ->where(function ($query) use ($userId) {
            $query
                // CASE 1: Comment on my post (not yet read)
                ->orWhere(function ($q) use ($userId) {
                    $q->whereHas('post', function ($postQuery) use ($userId) {
                        $postQuery->where('author_id', $userId);
                    })->where('is_post_owner_read', false);
                })

                // CASE 2: Reply to my comment (must be reply & unread)
                ->orWhere(function ($q) use ($userId) {
                    $q->whereNotNull('parent_message_id')
                      ->where('is_parent_message_owner_read', false)
                      ->whereHas('parent', function ($parentQuery) use ($userId) {
                          $parentQuery->where('author_id', $userId);
                      });
                })

                // CASE 3: My comment was marked as answer (show only if marked & flag = true)
                ->orWhere(function ($q) use ($userId) {
                    $q->where('author_id', $userId)
                      ->where('is_marked_answer', true)
                      ->where('is_post_comment_owner_read', true);
                });
        })
        ->get()
        ->map(fn($item) => [
            'type' => 'comment',
            'created_at' => $item->created_at,
            'data' => $item
        ]);

        $dms = DirectMessage::with('sender')
        ->where('target_user_id', $userId)
        ->where('is_read', false)
        ->get()
        ->map(fn($item) => [
            'type' => 'dm',
            'created_at' => $item->created_at,
            'data' => $item
        ]);

    // ❤️ Upvotes
        $upvotes = UserVote::with(['user', 'post', 'comment'])
        ->where('is_upvote', true)
        ->where('is_owner_read', false)
        ->where(function ($q) use ($userId) {
            $q->whereHas('post', fn($p) => $p->where('author_id', $userId))
              ->orWhereHas('comment', fn($p) => $p->where('author_id', $userId));
        })
        ->get()
        ->map(fn($item) => [
            'type' => 'upvote',
            'created_at' => $item->created_at,
            'data' => $item
        ]);

        // 🧩 Combine and sort all by created_at
        $notifications = collect()
            ->merge($comments)
            ->merge($dms)
            ->merge($upvotes)
            ->sortByDesc('created_at');

        // $dd();
    return view('notifications', compact('notifications'));
}

}