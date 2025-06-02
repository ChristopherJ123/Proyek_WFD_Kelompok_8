<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use App\Models\UserTopicFollowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function create()
    {
        $credentials = [
            'username' => 'admin',
            'password' => 'Admin123*',
        ];

        Auth::attempt($credentials);

        if (Auth::check()) {
            $user = Auth::user();
            $userTopicFollowing = UserTopicFollowing::where('user_id', $user['id'])
                ->join('topics', 'user_topic_following.topic_id', '=', 'topics.id')
                ->get();
            return view('dashboard', [
                'user_topic_followings' => $userTopicFollowing,
            ]);
        }
        return view('dashboard');
    }
}
