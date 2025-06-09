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

    public function getRouteKeyName(): string
    {
        return 'name';
    }

    public function owner() {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function posts() {
        return $this->hasMany(Post::class)->chaperone();
    }

    public function moderators() {
        return $this->belongsToMany(User::class, 'topic_moderators', 'topic_id', 'user_id')->withTimestamps();
    }

    public function blockedUsers() {
        return $this->hasMany(TopicBlockedUser::class);
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'user_topic_following', 'topic_id', 'user_id')->withTimestamps();
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function rules() {
        return $this->hasMany(TopicRules::class);
    }

    public function usersVisited()
    {
        return $this->belongsToMany(User::class, 'user_topic_visited', 'topic_id', 'user_id')->withTimestamps();
    }
}
