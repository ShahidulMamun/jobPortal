<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $job)
    {
       
       
       $job->delete();
       return redirect()->route('employer.jobs.index')->with('success', 'Job delete successfully');
      
    }
}
