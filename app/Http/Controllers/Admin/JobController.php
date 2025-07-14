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
}
