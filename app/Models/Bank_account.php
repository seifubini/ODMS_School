<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank_account extends Model
{
    use HasFactory;

    protected $fillable = [
    	'account_type', 'account_id', 'account', 'bank_id'
    ];

    public function bank(){

    	return $this->belongsTo(Bank::class);
    	
    }
}
