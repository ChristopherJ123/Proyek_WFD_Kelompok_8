<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicModerator extends Model
{
    protected $table = 'topic_moderators';

	protected $fillable = [
        'user_id',
        'topic_id'
	];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function blockedUsers() {
        return $this->belongsToMany(TopicBlockedUser::class);
    }
    
}