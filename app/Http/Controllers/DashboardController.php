<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use App\Models\UserTopicFollowing;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort_by' => 'nullable|string',
            'order_by' =>'nullable|string',
        ]);

        $order = $request->order_by ?? 'desc';

        if (Auth::check()) {
            $user = Auth::user();
            $userTopicFollowings = $user->topicFollowings()->pluck('topics.id');
            $postsBuilder = Post::query()
                ->whereIn('topic_id', $userTopicFollowings)
                ->withCount([
                    'votes as upvotes_count' => fn ($q) => $q->where('is_upvote', 1),
                    'votes as downvotes_count' => fn ($q) => $q->where('is_upvote', 0),
                ])
                ->when($request->search, function (\Illuminate\Database\Eloquent\Builder $query, string $search) {
                    $query->where('title', 'like', '%'.$search.'%')
                        ->orWhereHas('topic', function (\Illuminate\Database\Eloquent\Builder $query) use ($search) {
                            $query->where('name', 'like', '%'.$search.'%');
                        });
                });

            switch ($request->sort_by) {
                // Popular = upvote – downvote
                case 'Popular':
                    $postsBuilder->orderByRaw(
                        '(upvotes_count - downvotes_count) ' . $order
                    );
                    break;

                // Date = created_at
                case 'Date':
                    $postsBuilder->orderBy('created_at', $order);
                    break;

                // Default (Best) = ratio (handle ÷0 safely, cast to DECIMAL)
                default: // ‘Ratio’ or blank
                    $postsBuilder->orderByRaw(
                        'COALESCE(
                            CASE
                                WHEN downvotes_count = 0 THEN upvotes_count
                                ELSE upvotes_count / downvotes_count
                            END, 0
                    ) ' . $order
                    );
                    break;
            }

            $posts = $postsBuilder->with(['topic', 'author'])->paginate(20);

            $recentPosts = Post::whereIn('topic_id', $userTopicFollowings)
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
        return view('homepage', [
            'search' => $request->search,
            'sortBy' => $request->sort_by,
            'orderBy' => $request->order_by,
        ]);
    }
}
