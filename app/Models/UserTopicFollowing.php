<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTopicFollowing extends Model
{
    protected $table = 'user_topic_following';
    
    protected $fillable = [
        'user_id',
        'topic_id',
	];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }
}