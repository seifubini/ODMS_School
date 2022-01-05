<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    public $timestamps = true;

    protected $fillable = [
    	'address', 'phone_number', 'name', 'email', 'user_id'
    ];
}
