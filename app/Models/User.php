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
        'email',
        'password',
        'birth_date',
        'profile_picture_link',
        'bio',
        'education',
        'university',  
    ];

    public function roles() {
        return $this->belongsTo(Role::class);
    }

     public function posts() {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function comments() {
        return $this->hasMany(PostComment::class, 'author_id');
    }

    public function votes() {
        return $this->hasMany(UserVote::class);
    }

     public function postReports() {
        return $this->hasMany(UserPostReport::class);
    }

    public function topicFollowings() {
        return $this->hasMany(UserTopicFollowing::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'user_genre');
    }

    public function sentMessages() {
        return $this->hasMany(DirectMessage::class, 'user_id');
    }

     public function receivedMessages() {
        return $this->hasMany(DirectMessage::class, 'target_user_id');
    }
    
}