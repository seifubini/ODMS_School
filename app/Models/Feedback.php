<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';
    public $timestamps = true;

    protected $fillable = [
    	'feedback_detail', 'feedback_by', 'donation_id', 'feedback_to', 'viewed'
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
