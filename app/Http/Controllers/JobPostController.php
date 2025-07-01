<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use Illuminate\Support\Str;
class JobPostController extends Controller
{
   public function create(){

    return view('job.create');
   }


    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'job_title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'job_type' => 'required|string',
            'salary_range' => 'nullable|string|max:100',
            'deadline' => 'nullable|date',
            'application_email' => 'nullable|email',
            'application_link' => 'nullable|url',
            'job_language' => 'nullable|string|max:5',
            'description' => 'required|string|min:30',
        ]);

        //  Prepare data
        $data = $request->only([
            'job_title',
            'category',
            'job_type',
            'job_level',
            'vacancy',
            'location',
            'salary_range',
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
            'tags',
        ]);

        // Add extra data
        $data['employer_id']     = auth('employeer')->id();
        $data['job_code']        = 'JOB' . strtoupper(Str::random(6));
        $data['remote_available'] = $request->has('remote_available');
        $data['salary_hidden']   = $request->has('salary_hidden');
        $data['is_featured']     = $request->has('is_featured');
        $data['status']          = true;
        $data['is_approved']     = false;
        $data['view_count']      = 0;

        // Store to DB
        JobPost::create($data);

        // Redirect
        return redirect()->back()->with('success', 'Job posted successfully and pending admin approval.');

    }


}
