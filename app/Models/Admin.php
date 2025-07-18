<?php

namespace App\Models;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['name', 'email', 'password'];


    public function setPasswordAttribute($value)
        {
            if ($value && !Hash::needsRehash($value)) {
                $this->attributes['password'] = bcrypt($value);
            }
        }


}


