<?php

namespace App\Http\Controllers;

use App\Models\TopicBlockedUser;
use App\Models\TopicModerator;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicBanController extends Controller
{
    public function ban(Request $request, $topicId, $userId)
    {
        $request->validate([
            'reason' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        // cek topik 
        $topic = Topic::findOrFail($topicId);

        $isAdmin = $user->role_id === 2;
        $isModerator = TopicModerator::where('topic_id', $topicId)->where('user_id', $user->id)->exists();

        if (!$isAdmin && !$isModerator) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // gak duplikat ban
        if (TopicBlockedUser::where('topic_id', $topicId)->where('user_id', $userId)->exists()) {
            return response()->json(['message' => 'User is already banned from this topic.'], 400);
        }

        $banData = [
            'topic_id' => $topicId,
            'user_id' => $userId,
            'reason' => $request->reason,
        ];

        if ($isAdmin) {
            $banData['admin_id'] = $user->id;
        } elseif ($isModerator) {
            $moderator = TopicModerator::where('topic_id', $topicId)->where('user_id', $user->id)->first();
            $banData['moderator_id'] = $moderator->id;
        }

        TopicBlockedUser::create($banData);

        return response()->json(['message' => 'User has been banned from this topic.']);
    }

    public function unban(Request $request, $topicId, $userId)
    {
        $user = $request->user();

        // Cek apakah dia admin atau moderator
        $isAdmin = $user->role_id === 2;
        $isModerator = $user->moderatedTopics()->where('topic_id', $topicId)->exists();

        if (!($isAdmin || $isModerator)) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        // Hapus dari tabel topic_blocked_user
        $deleted = \DB::table('topic_blocked_users')
            ->where('topic_id', $topicId)
            ->where('user_id', $userId)
            ->delete();

        if ($deleted) {
            return response()->json(['message' => 'User has been unbanned from the topic.']);
        } else {
            return response()->json(['message' => 'User was not banned or already unbanned.'], 404);
        }
    }

}
