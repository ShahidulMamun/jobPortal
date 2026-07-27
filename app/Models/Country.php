<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'iso',
        'phone_code',
        'currency_code',
        'currency_symbol',
        'status',
    ];
   
    public function states()
    {
       return $this->hasMany(State::class);
    }


}
