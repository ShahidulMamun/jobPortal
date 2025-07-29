<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\JobPost;
use App\Models\Category;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employerId = auth('employer')->id();

        $jobs = JobPost::myJobs()->paginate(10);

        return view('employer.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $job)
    {

      $this->authorize('update', $job); // 🔐 check permission
      $categories = Category::where('status', true)->orderBy('name')->pluck('name','id');
       return view('jobs.edit', compact('job','categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, JobPost $job)
     {
     // Authorization check
     $this->authorize('update', $job);

     // Validate request
     $request->validate([
        'job_title' => 'required|string|max:255',
        'category' => 'required|exists:categories,id',
        'job_type' => 'required|string',
        'job_level' => 'required|string',
        'vacancy' => 'nullable|integer',
        'location' => 'nullable|string|max:255',
        'remote_available' => 'nullable|boolean',
        'salary_range' => 'nullable|string|max:255',
        'salary_hidden' => 'nullable|boolean',
        'deadline' => 'nullable|date',
        'application_deadline_time' => 'nullable',
        'application_email' => 'nullable|email',
        'application_link' => 'nullable|url',
        'tags' => 'nullable|string',
        'skills' => 'nullable|string',
        'gender' => 'nullable|string',
        'age_limit' => 'nullable|string',
        'description' => 'nullable|string',
        'responsibilities' => 'nullable|string',
        'requirements' => 'nullable|string',
        'education_requirements' => 'nullable|string',
        'experience_requirements' => 'nullable|string',
        'job_benefits' => 'nullable|string',
        'apply_instruction' => 'nullable|string',
        'job_language' => 'nullable|string',
        'is_featured' => 'nullable|boolean',
    ]);
       
    
     // Update job
     $job->update([
        'job_title' => $request->job_title,
        'category' => $request->category,
        'job_type' => $request->job_type,
        'job_level' => $request->job_level,
        'vacancy' => $request->vacancy,
        'location' => $request->location,
        'remote_available' => $request->has('remote_available'),
        'salary_range' => $request->salary_range,
        'salary_hidden' => $request->has('salary_hidden'),
        'deadline' => $request->deadline,
        'application_deadline_time' => $request->application_deadline_time,
        'application_email' => $request->application_email,
        'application_link' => $request->application_link,
        'tags' => $request->tags,
        'skills' => $request->skills,
        'gender' => $request->gender,
        'age_limit' => $request->age_limit,
        'description' => $request->description,
        'responsibilities' => $request->responsibilities,
        'requirements' => $request->requirements,
        'education_requirements' => $request->education_requirements,
        'experience_requirements' => $request->experience_requirements,
        'job_benefits' => $request->job_benefits,
        'apply_instruction' => $request->apply_instruction,
        'job_language' => $request->job_language,
        'is_featured' => $request->has('is_featured'),
    ]);

      return redirect()->route('employer.jobs.index')->with('success', 'Job updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $job)
    {
        if ($job->employer_id !== auth('employer')->id()) {
         abort(403,'Unauthorized access to this job.');
        }  
        $job->delete();
        return redirect()->route('employer.jobs.index')->with('success', 'Job delete successfully');
      
    }

    public function trash(){

        $jobs = JobPost::where('employer_id',auth('employer')->id())->onlyTrashed()->latest()->paginate(5);
        return view('employer.jobs.trash', compact('jobs'));
    }

    public function restore($id){
       
       

      $job = JobPost::onlyTrashed()->findOrfail($id);
      if ($job->employer_id !== auth('employer')->id()) {
         abort(403,'Unauthorized access to this job.');
        } 
      $job->restore();
      return redirect()->route('employer.jobs.trash')->with('success', 'Job Restore successfully');
    }


    public function forceDelete($id){
       
       $job = JobPost::onlyTrashed()->findOrfail($id);
       if ($job->employer_id !== auth('employer')->id()) {
         abort(403,'Unauthorized access to this job.');
        } 
       $job->forceDelete();
       return back()->with('success','Job Deleted successfully');
    }


   

}
