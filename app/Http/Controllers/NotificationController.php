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
                // CASE 1: Marked as answer (and unread)
                ->orWhere(function ($q) use ($userId) {
                    $q->where('author_id', $userId)
                      ->where('is_marked_answer', true)
                      ->where('is_post_comment_owner_read', false); // fix here
                })

                // CASE 2: Reply to comment
                ->orWhere(function ($q) use ($userId) {
                    $q->whereNotNull('parent_message_id')
                      ->where('is_parent_message_owner_read', false)
                      ->whereHas('parent', function ($parentQuery) use ($userId) {
                          $parentQuery->where('author_id', $userId);
                      });
                })

                // CASE 3: comment was marked as answer 
                ->orWhere(function ($q) use ($userId) {
                    $q->whereHas('post', function ($postQuery) use ($userId) {
                        $postQuery->where('author_id', $userId);
                    })->where('is_post_owner_read', false);
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

    //  Upvotes
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

        // Combine and sort all by created_at
        $notifications = collect()
            ->merge($comments)
            ->merge($dms)
            ->merge($upvotes)
            ->sortByDesc('created_at');

        // $dd();
    return view('notifications', compact('notifications'));
}

public function redirect($type, $id) {
    $userId = auth()->id();

    switch ($type) {
        case 'comment':
            $comment = \App\Models\PostComment::with(['post.topic', 'parent'])->findOrFail($id);

            $isUpdated = false;

            // CASE 1: Marked as answer
            if ($comment->is_marked_answer && $comment->author_id === $userId) {
                $comment->is_post_comment_owner_read = true;
                $isUpdated = true;
            }

            // CASE 2: Reply to your comment
            if (
                $comment->parent &&
                $comment->parent->author_id === $userId 
            ) {
                $comment->is_parent_message_owner_read = true;
                $isUpdated = true;
            }

            // CASE 3: Commented on your post
            if (
                $comment->post->author_id === $userId &&
                !$comment->is_post_owner_read
            ) {
                $comment->is_post_owner_read = true;
                $isUpdated = true;
            }

            if ($isUpdated) {
                $comment->save();
            }
            return redirect()->route('topics.posts.show', [$comment->post->topic, $comment->post]);
        
        case 'upvote':
            $vote = \App\Models\UserVote::with(['post.topic', 'comment.post.topic'])->findOrFail($id);

            if (
                ($vote->post && $vote->post->author_id === $userId) ||
                ($vote->comment && $vote->comment->author_id === $userId)
            ) {
                $vote->is_owner_read = true;
                $vote->save();
            }

            if ($vote->post) {
                return redirect()->route('topics.posts.show', [$vote->post->topic, $vote->post]);
            } elseif ($vote->comment) {
                return redirect()->route('topics.posts.show', [$vote->comment->post->topic, $vote->comment->post]);
            }
            break;

        case 'dm':
            $dm = \App\Models\DirectMessage::findOrFail($id);
            if ($dm->target_user_id === $userId) {
                $dm->is_read = true;
                $dm->save();
            }
            return redirect()->route('messages.index', $dm->sender_id);

        default:
            abort(404);
    }
}

}