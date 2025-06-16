<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ExplorePageController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort_by' => 'nullable|string',
            'order_by' =>'nullable|string',
        ]);

        $postsBuilder = Post::query()
            ->when($request->search, function (\Illuminate\Database\Eloquent\Builder $query, string $search) {
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhereHas('topic', function (\Illuminate\Database\Eloquent\Builder $query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    });
            });

        match ($request->sort_by) {
            default => $postsBuilder
                ->select('*')
                ->inRandomOrder(),
            'Best' => $postsBuilder
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

        $recentPosts = Post::query()
            ->latest()
            ->limit(20)
            ->with(['topic', 'votes'])
            ->get();

        return view('homepage', [
            'search' => $request->search,
            'sortBy' => $request->sort_by,
            'orderBy' => $request->order_by,
            'posts' => $posts,
            'recentPosts' => $recentPosts,
        ]);
    }

}
