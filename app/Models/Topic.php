<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $fillable = [
        'owner_id',
        'genre_id',
        'name',
        'description',
        'icon_image_link',
        'banner_image_link',
    ];

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function moderators() {
        return $this->hasMany(TopicModerator::class);
    }

    public function blockedUsers() {
        return $this->hasMany(TopicBlockedUser::class);
    }

    public function followers() {
        return $this->hasMany(UserTopicFollowing::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function rules() {
        return $this->hasMany(TopicRules::class);
    }

}
