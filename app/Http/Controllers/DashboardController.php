<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use App\Models\UserTopicFollowing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function retrievePosts(Request $request, ?string $search = '')
    {
        $request->validate([
            'sort_by' => 'required|string',
            'order_by' =>'required|string',
        ]);

        $user = $request->user();
        $userTopicFollowings = $user->topicFollowings()->pluck('topics.id');

        switch ($request->sort_by) {
            case 'Best':
                $queriedPosts = Post::whereIn('topic_id', $userTopicFollowings)
                    ->where('title', 'like', '%'.$search.'%')
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
                    ->orderBy('votes_ratio', $request->order_by)
                    ->get();
                return $queriedPosts;
            case 'Popular':
                $queriedPosts = Post::whereIn('topic_id', $userTopicFollowings)
                    ->where('title', 'like', '%'.$search.'%')
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
                    ->orderBy('votes_delta', $request->order_by)
                    ->get();
                return $queriedPosts;
            case 'Date':
                $queriedPosts = Post::whereIn('topic_id', $userTopicFollowings)
                    ->where('title', 'like', '%'.$search.'%')
                    ->orderBy('created_at', $request->order_by)
                    ->get();
                return $queriedPosts;
        }

        abort(500);
    }

    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userTopicFollowings = $user->topicFollowings();
            $recentlyVisitedTopics = $user->topicsVisited()->latest()->get();
            $bestPosts = Post::whereIn('topic_id', $userTopicFollowings->pluck('topics.id'))
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
                ->orderBy('votes_ratio', 'desc')
                ->get();
            $recentPosts = Post::whereIn('topic_id', $userTopicFollowings->pluck('topics.id'))
                ->latest()
                ->get();
            return view('dashboard', [
                'userTopicFollowings' => $userTopicFollowings->get(),
                'recentlyVisitedTopics' => $recentlyVisitedTopics,
                'bestPosts' => $bestPosts,
                'recentPosts' => $recentPosts,
            ]);
        }
        return view('dashboard');
    }
}
