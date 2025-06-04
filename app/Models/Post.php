<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'author_id',
        'topic_id',
        'title',
        'description',
        'share_count',
        'is_deleted',
        'moderator_notice',
    ];


    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments() {
        return $this->hasMany(PostComment::class);
    }

    public function images() {
        return $this->hasMany(PostImage::class);
    }

    public function reports() {
        return $this->hasMany(UserPostReport::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function votes() {
        return $this->hasMany(UserVote::class);
    }

}
