<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donee extends Model
{
    use HasFactory;

    protected $table = 'donees';
    public $timestamps = true;

    protected $fillable = [
    	'first_name', 'last_name', 'gender', 'phone_no', 'address', 'email', 'user_id'
    ];

    public function hospital_record()
    {
    	return $this->belongsTo(Hospital_Record::class);
    }
}
