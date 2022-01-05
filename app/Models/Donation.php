<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';
    public $timestamps = true;

    protected $fillable = [
    	'donation_name', 'donation_description', 'donation_location', 'donation_created_by', 'donation_image'
    ];

}
