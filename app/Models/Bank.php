<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name', 'phone_number', 'created_by'
    ];

    public function user(){
    	
    	return $this->BelongsTo(User::class);
    }

    public function bank_account()
    {
        return $this->HasMany(Bank_account::class);
    }
}
