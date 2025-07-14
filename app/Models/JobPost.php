<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'job_code',
        'job_title',
        'slug',
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

     protected $casts = [
        'deadline' =>   'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function getFeaturedBadgeAttribute()
    {
        return $this->is_featured ? '🌟 Featured' : '';
    }
    
    //scope method for fect job and reuseable
    public function scopelatestJobs($query){

      $now = \Carbon\Carbon::now();

      return $query->where('is_approved', true)
        ->where('status', true)
        ->where(function ($query) use ($now) {
            $query->where('deadline', '>', $now->toDateString())
                  ->orWhere(function ($q) use ($now) {
                      $q->where('deadline', '=', $now->toDateString())
                        ->where('application_deadline_time', '>', $now->toTimeString());
                        });
               })->orderBy('deadline');

    }

    public function scopemyJobs($query){

        $employerId = auth('employer')->id();
        $query->where('employer_id', $employerId)
                       ->orderBy('created_at', 'desc');
    }

    //for generate slug and job code
    protected static function booted()
    {
        static::created(function ($job) {
            $job_code = 'JOB-' .$job->id.Str::upper(Str::random(8));
            $slug = Str::slug($job->job_title . '-' . $job_code);

            // Update after insert
            $job->update([
                'job_code' => $job_code,
                'slug' => $slug,
            ]);
        });

        static::updating(function ($job) {
            $job_code = $job->job_code;
            $slug = Str::slug($job->job_title . '-' . $job_code);
            $job->slug = $slug;
        });

    }







}
