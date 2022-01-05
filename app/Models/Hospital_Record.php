<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital_Record extends Model
{
    use HasFactory;

    protected $table = 'hospital__records';
    public $timestamps = true;

    protected $fillable = [
    	'doctor_id', 'hospital_id', 'donee_id', 'description'
    ];

    public function hospitals()
    {
    	return $this->hasMany(Hospital::class);
    }

    public function doctors()
    {
    	return $this->hasMany(Doctor::class);
    }

    public function donees()
    {
    	return $this->hasMany(Donee::class);
    }

}
