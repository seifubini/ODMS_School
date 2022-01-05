<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    public $timestamps = true;

    protected $fillable = [
    	'first_name', 'last_name', 'specialization', 'phone_number', 'email', 'user_id', 'hospital_name', 'created_by'
    ];

    public function hospital_record()
    {
    	return $this->belongsTo(Hospital_Record::class);
    }
}
