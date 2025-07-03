<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
class Employer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'password',
        'company_website',
        'logo',
        'company_address',
        'company_description',
        'industry_type',
        'is_approved',
        'status',
        'last_login_at',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'is_approved' => 'boolean',
        'status' => 'boolean',
    ];

     public function setPasswordAttribute($value)
    {
      
       if (!empty($value)) {
        $this->attributes['password'] = bcrypt($value);
       }
   
    }

     public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'employer_id');
    }

}
