<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPost;

class HomeController extends Controller
{
    
    public function index(){

      $jobs = JobPost::latestJobs()->take(5)->get();
      return view('home', compact('jobs'));    

    }
}
