<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'job_code',
        'job_title',
        'company_name',
        'company_logo',
        'job_type',
        'category',
        'job_level',
        'vacancy',
        'location',
        'remote_available',
        'salary_range',
        'salary_hidden',
        'deadline',
        'application_deadline_time',
        'description',
        'responsibilities',
        'requirements',
        'education_requirements',
        'experience_requirements',
        'gender',
        'age_limit',
        'skills',
        'job_benefits',
        'application_email',
        'application_link',
        'apply_instruction',
        'job_language',
        'is_featured',
        'is_approved',
        'status',
        'tags',
        'view_count',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function getFeaturedBadgeAttribute()
    {
        return $this->is_featured ? '🌟 Featured' : '';
    }
}
