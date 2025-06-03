<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

	protected $fillable = [
        'name'
	];

    public function topic() {
        return $this->belongsToMany(Topic::class);
    }
    
    public function userGenres() {
        return $this->belongsToMany(UserGenre::class);
    }
    
}