<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPostReport extends Model
{
     protected $table = 'user_post_reports';

    protected $fillable = [
        'user_id',
        'post_id',
        'post_comment_id',
        'report_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function comment() {
        return $this->belongsTo(PostComment::class, 'post_comment_id');
    }
}
