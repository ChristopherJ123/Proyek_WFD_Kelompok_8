<?php

namespace App\Policies;

use App\Models\PostComment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostCommentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PostComment $postComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PostComment $postComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PostComment $postComment): bool
    {
        return $user->id === $postComment->author_id ||
            $user->id === $postComment->post->author_id ||
            $user->moderatedTopics()->where('topic_id', $postComment->post->topic_id)->exists() ||
            $user->role_id === 2;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PostComment $postComment): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PostComment $postComment): bool
    {
        return false;
    }
}
