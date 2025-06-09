<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

	protected $fillable = [
        'name'
	];

    public function topics() {
        return $this->hasMany(Topic::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_genres', 'genre_id', 'user_id')->withTimestamps();
    }

}