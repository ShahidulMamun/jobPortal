<?php

namespace App\Http\Controllers\Candidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPost;

class JobController extends Controller
{
    public function index(){
        $jobs = JobPost::where('status',1)->get();
        return view('candidate.jobs.index',compact('jobs'));
    }
}
