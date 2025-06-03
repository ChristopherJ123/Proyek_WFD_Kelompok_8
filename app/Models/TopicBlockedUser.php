<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicBlockedUser extends Model
{
     protected $table = 'topic_blocked_users';

    protected $fillable = [
        'user_id', 
        'topic_id',
        'moderator_id',
        'reason',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }
    
    public function moderator() {
        return $this->belongsTo(TopicModerator::class);
    }
}