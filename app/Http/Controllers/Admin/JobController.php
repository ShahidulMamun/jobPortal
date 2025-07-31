<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;

class JobController extends Controller
{
    public function pendingJobsForApproval(){
     
        $now = \Carbon\Carbon::now();
        $jobs = JobPost::where('is_approved', false)
        ->where('status', true)
        ->where(function ($query) use ($now) {
            $query->where('deadline', '>', $now->toDateString())
                  ->orWhere(function ($q) use ($now) {
                      $q->where('deadline', '=', $now->toDateString())
                        ->where('application_deadline_time', '>', $now->toTimeString());
                        });
               })->orderBy('deadline')->take(10)->get();
        return view('admin.jobs.index',compact('jobs'));
    }

    public function activeJobs(){

        $now = \Carbon\Carbon::now();
        $jobs = JobPost::where('is_approved', true)
        ->where('status', true)
        ->where(function ($query) use ($now) {
            $query->where('deadline', '>', $now->toDateString())
                  ->orWhere(function ($q) use ($now) {
                      $q->where('deadline', '=', $now->toDateString())
                        ->where('application_deadline_time', '>', $now->toTimeString());
                        });
               })->orderBy('deadline')->take(10)->get();
        return view('admin.jobs.index',compact('jobs'));

    }

    public function show(JobPost $job)
    {
    return view('admin.jobs.show', compact('job'));
    }


    public function approveJob(JobPost $job){

        $job->is_approved = true;
        $job->save();

        return back()->with('success','Job Approve successfully');
    }

    public function reject(JobPost $job)
    {
        $job->update([
            'is_approved' => false,
            'status' => false,
        ]);

        return redirect()->route('admin.pending.jobs')->with('success', 'Job rejected successfully.');
   }

   public function destroy(JobPost $job){

      $job->delete();
      return redirect()->route('admin.pending.jobs')->with('success','Job Delete successfully');
   }


   public function trashedJobs(){

      $trashedJobs = JobPost::onlyTrashed()->latest()->get();

      return view('admin.jobs.trash',compact('trashedJobs'));
   }

    public function restore($id){

      $job = JobPost::onlyTrashed()->findOrFail($id);
      $job->restore();
      return redirect()->route('admin.pending.jobs')->with('success','Job Restore successfully');
    }

   public function forceDelete($id){

     $job = JobPost::onlyTrashed()->findOrFail($id);
     $job->forceDelete();
    return back()->with('success', 'Job permanently deleted.');
   }


     public function viewApplicants($jobId)
      {
       $job = JobPost::with('jobApplications.user')->findOrFail($jobId);
        return view('admin.jobs.applicants', compact('job'));
     }

}
