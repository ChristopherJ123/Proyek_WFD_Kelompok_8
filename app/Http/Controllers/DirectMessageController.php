<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirectMessage;
use App\Models\User;
use App\Models\DirectMessageImage;
use Illuminate\Support\Facades\Auth;

class DirectMessageController extends Controller
{
    public function dmMenu() {
        $userId = auth()->id();
        
        $messagedUser = DirectMessage::where('sender_id', $userId)
        ->orWhere('target_user_id', $userId)
        ->orderByDesc('created_at')
        ->get()
        ->map(fn($msg) => $msg->sender_id === $userId ? $msg->receiver : $msg->sender)
        ->unique('id')
        ->values();

        return view('direct-message-menu', compact('messagedUser'));
    }

    public function startConversation(Request $request) {
        
        $request->validate([
            'username' => 'required|exists:users,username',
        ]);

        $targetUser = User::where('username', $request->username)->first();

        if ($targetUser->id === auth()->id()) {
            return back()->with('error', 'You cannot message yourself.');
        }

        return redirect()->route('messages.index', $targetUser->id);
    }


    public function index(User $user) {
       $authId = auth()->id();
       
       DirectMessage::where('sender_id', $user->id)
       ->where('target_user_id', $authId)
       ->where('is_read', false)
       ->update(['is_read' => true]);

        $messages = DirectMessage::with('images')
        ->where(function ($q) use ($user, $authId) {
            $q->where('sender_id', $authId)->where('target_user_id', $user->id);
        })->orWhere(function ($q) use ($user, $authId) {
            $q->where('sender_id', $user->id)->where('target_user_id', $authId);
        })
        ->orderBy('created_at')
        ->get();

        return view('direct-message-user', compact('user', 'messages'));
        
    }

    public function store(Request $request, User $user) {
        $request->validate([
            'message' => 'nullable|string|max:2000',
            'images.*' => 'nullable|image|max:4096',
        ]);

        $message = DirectMessage::create([
            'sender_id' => auth()->id(),
            'target_user_id' => $user->id,
            'message' => $request->message,
            'is_read' => false,
        ]);

        if ($request->hasFile('images')) {
           foreach ($request->file('images') as $image) {
                $path = $image->store('message_images', 'public');

                DirectMessageImage::create([
                    'direct_messsage_id' => $message->id,
                    'image_link' => $path,
                ]);
            }
        }



        return redirect()->route('messages.index', $user->id);
    }
    
}