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
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userTopicFollowings = $user->topicFollowings();
            $recentlyVisitedTopics = $user->topicsVisited()->latest()->get();
            $bestPosts = Post::whereIn('topic_id', $userTopicFollowings->pluck('topics.id'))
                ->join('topics', 'topics.id', '=', 'posts.topic_id')
                ->select('posts.*', 'topics.name AS topic_name')
                ->withCount([
                    'votes as upvote_count' => function (Builder $query) {
                        $query->where('is_upvote', true);
                    },
                    'votes as downvote_count' => function (Builder $query) {
                        $query->where('is_upvote', false);
                    },
                ])
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
                    END as vote_ratio
                ')
                ->orderBy('vote_ratio', 'desc')
                ->get();
            $recentPosts = Post::whereIn('topic_id', $userTopicFollowings->pluck('topics.id'))
                ->join('topics', 'topics.id', '=', 'posts.topic_id')
                ->select('posts.*', 'topics.name AS topic_name')
                ->withCount([
                    'votes as upvote_count' => function (Builder $query) {
                        $query->where('is_upvote', true);
                    },
                    'votes as downvote_count' => function (Builder $query) {
                        $query->where('is_upvote', false);
                    },
                    'comments',
                ])
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
