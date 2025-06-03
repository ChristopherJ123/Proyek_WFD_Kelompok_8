<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopicRules extends Model
{
    protected $table = 'topic_rules';

    protected $fillable = [
        'topic_id',
        'order',
        'title',
        'description',
    ];

    public function topic() {
        return $this->belongsTo(Topic::class);
    }
}