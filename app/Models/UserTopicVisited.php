<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTopicVisited extends Model
{
    protected $table = 'user_topic_visited';

	protected $fillable = [
        'topic_id'
	];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }
}
