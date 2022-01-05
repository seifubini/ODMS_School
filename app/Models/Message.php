<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    public $timestamps = true;

    protected $fillable = ['message', 'user_id', 'sender_id', 'receiver_id'];

    /**
    * A message belong to a user
    * 
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
