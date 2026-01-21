<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\JobApplication;
use App\Models\Category;

class HomeController extends Controller
{
    
    public function registerPage(){

        return view('auth.register-page');
    }
    public function index(){
      
      $categories = Category::where('status',1)->withCount('jobs')->get();
      $jobs = JobPost::latestJobs()->take(5)->get();
      return view('index', compact(['jobs','categories']));    

    }

    public function show(JobPost $job)
    {
        return view('jobs.show', compact('job'));
    }


    public function apply(Request $request, $jobId)
    {
       
        // return $request->all();

        $request->validate([
            'cover_letter' => 'nullable|string|max:1000',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:2048',
        ]);

        $job = JobPost::findOrFail($jobId);

        // Prevent duplicate application
        if (JobApplication::where('user_id', auth()->id())->where('job_id', $job->id)->exists()) {
            return back()->with('error', 'You already applied to this job.');
        }

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => auth()->id(),
            'cover_letter' => $request->cover_letter,
            'cv_path' => $cvPath,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }


}
