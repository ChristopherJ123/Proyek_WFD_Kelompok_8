<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectMessageImage extends Model
{
    protected $table = 'direct_message_images';

	protected $fillable = [
        'direct_message_id',
        'image_link',
	];

    public function message() {
        return $this->belongsTo(DirectMessage::class);
    }

}