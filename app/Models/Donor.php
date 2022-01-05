<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $table = 'donors';
    public $timestamps = true;

    protected $fillable = [
    	'first_name', 'last_name', 'gender', 'phone_no', 'address', 'email', 'user_id'
    ];
}
