<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
 {
    use HasFactory;

    protected $fillable = ['name', 'description','slug'];


    public function jobs()
    {
      return $this->hasMany(JobPost::class, 'category_id');
    }



}
