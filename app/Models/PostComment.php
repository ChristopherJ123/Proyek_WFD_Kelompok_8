<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'post_comments';
    
    protected $fillable = [
        'author_id',
        'parent_message_id',
        'message',
        'is_answer',
        'is_post_owner_read',
        'is_parent_message_owner_read',
        'share_count',
        'is_deleted',
        'moderator_notice',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function votes() {
        return $this->hasMany(UserVote::class, 'post_comment_id');
    }

    public function reports() {
        return $this->hasMany(UserPostReport::class, 'post_comment_id');
    }

    public function images() {
        return $this->hasMany(PostImage::class);
    }
    
}