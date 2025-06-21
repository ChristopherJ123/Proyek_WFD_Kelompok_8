<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();

        $postsBuilder = $user
            ->posts()
            ->when($request->search, function (\Illuminate\Database\Eloquent\Builder $query, string $search) {
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhereHas('topic', function (\Illuminate\Database\Eloquent\Builder $query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    });
            });

        match ($request->sort_by) {
            default => $postsBuilder
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

        return view('profile', [
            'search' => $request->search,
            'sortBy' => $request->sort_by,
            'orderBy' => $request->order_by,
            'posts' => $posts,
            'user' => $user,
        ]);
    }

    /**
     * Show user profile.
     */
    public function show(Request $request, User $user): View
    {
        $postsBuilder = $user
            ->posts()
            ->when($request->search, function (\Illuminate\Database\Eloquent\Builder $query, string $search) {
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhereHas('topic', function (\Illuminate\Database\Eloquent\Builder $query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    });
            });

        match ($request->sort_by) {
            default => $postsBuilder
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

        return view('profile', [
            'search' => $request->search,
            'sortBy' => $request->sort_by,
            'orderBy' => $request->order_by,
            'posts' => $posts,
            'user' => $user,
        ]);    }

    /**
     * Show profile edit form.
     */
    public function edit(Request $request, User $user): View
    {
        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Validate avatar and bio manually
        $validated = $request->validate([
            'bio' => 'nullable|string|max:1000',
            'education' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'birth_date' => 'required|date',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $user->update([
            'bio' => $validated['bio'],
            'education' => $validated['education'],
            'university' => $validated['university'],
            'birth_date' => $validated['birth_date'],
        ]);

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('images/profile_icons', 'public');
            $user->profile_picture_link = $avatarPath;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', 'profile-updated');
    }

    /**
     * Delete user account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Account have been deleted.');
    }
}

