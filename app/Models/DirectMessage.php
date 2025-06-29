<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirectMessage extends Model
{
    protected $table = 'direct_messages';

	protected $fillable = [
        'sender_id',
        'target_user_id',
        'message',
        'is_read',
	];

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'target_user_id');
    }

   public function images() {
        return $this->hasMany(DirectMessageImage::class, 'direct_messsage_id');
    }

}