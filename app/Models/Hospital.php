<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'hospitals';
    public $timestamps = true;

    protected $fillable = [
    	'name', 'address', 'phone_number', 'email', 'user_id'
    ];

    public function hospital_record()
    {
    	return $this->belongsTo(Hospital_Record::class);
    }

}
