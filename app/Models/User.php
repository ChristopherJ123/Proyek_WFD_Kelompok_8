<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'username',
        'email',
        'password',
        'birth_date',
        'email_verified_at',
        'profile_picture_link',
        'bio',
        'education',
        'university',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'user_genres', 'user_id', 'genre_id')->withTimestamps();
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'owner_id');
    }

    public function posts() {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'author_id');
    }

    public function topicFollowings()
    {
        return $this->belongsToMany(Topic::class, 'user_topic_following', 'user_id', 'topic_id')->withTimestamps();
    }

    public function votes()
    {
        return $this->hasMany(UserVote::class);
    }

    public function postReports()
    {
        return $this->hasMany(UserPostReport::class);
    }

    public function topicModerators()
    {
        return $this->belongsToMany(Topic::class, 'topic_moderators', 'user_id', 'topic_id')->withTimestamps();
    }

    public function topicBlocked()
    {
        return $this->hasMany(TopicBlockedUser::class, 'user_id');
    }

    public function topicBlockedAsModerator()
    {
        return $this->hasMany(TopicBlockedUser::class, 'moderator_id');
    }

    public function sentMessages() {
        return $this->hasMany(DirectMessage::class, 'user_id');
    }

    public function receivedMessages() {
        return $this->hasMany(DirectMessage::class, 'target_user_id');
    }

    public function topicsVisited()
    {
        return $this->belongsToMany(Topic::class, 'user_topic_visited', 'user_id', 'topic_id')->withTimestamps();
    }

    public function isBannedFromTopic($topicId)
    {
        return \DB::table('topic_blocked_users')
            ->where('user_id', $this->id)
            ->where('topic_id', $topicId)
            ->exists();
    }

    public function moderatedTopics()
    {
        return $this->belongsToMany(Topic::class, 'topic_moderators', 'user_id', 'topic_id');
    }



}
