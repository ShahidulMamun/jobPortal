<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'degree',
        'field_of_study',
        'institution',
        'board_university',
        'result',
        'passing_year',
        'start_year',
        'end_year',
    ];

    protected $casts = [
        'user_id'    => 'integer',
        'start_year' => 'integer',
        'end_year'   => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
