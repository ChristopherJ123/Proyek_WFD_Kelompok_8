<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    use HasFactory;

    protected $table = 'user_votes';

    protected $fillable = [
        'user_id',
        'post_id',
        'post_comment_id',
        'is_upvote',
        'is_owner_read',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function comment() {
        return $this->belongsTo(PostComment::class, 'post_comment_id');
    }
}