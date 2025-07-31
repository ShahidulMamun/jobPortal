<?php
use App\Http\Controllers\Employer\EmployerAuthController;
use App\Http\Controllers\Employer\EmployerProfileController;
use App\Http\Controllers\Employer\JobController;
use App\Http\Controllers\JobPostController;

Route::prefix('employer')->name('employer.')->group(function () {
 
   

    Route::get('/register', [EmployerAuthController::class, 'showRegisterForm'])->name('register')->middleware('guest:employer');
    Route::post('/register', [EmployerAuthController::class, 'register'])->name('register.store')->middleware('guest:employer');

    Route::get('/login', [EmployerAuthController::class, 'showLoginForm'])->name('login')->middleware('guest:employer');
    Route::post('/login', [EmployerAuthController::class, 'login'])->name('login');

    Route::get('/dashboard', [EmployerAuthController::class, 'dashboard'])->middleware('auth:employer')->name('dashboard');  
    
    //create jobs and update
    Route::get('/job-post/create', [JobPostController::class, 'create'])->name('job.create')->middleware('auth:employer');
    Route::post('/job-post/store', [JobPostController::class, 'store'])->name('job.store')->middleware('auth:employer');
   Route::get('/posted/jobs', [JobController::class, 'index'])->name('jobs.index')->middleware('auth:employer');

   Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit')->middleware('auth:employer');
   Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update')->middleware('auth:employer');

   Route::delete('/jobs/delete/{job}/', [JobController::class, 'destroy'])->name('jobs.destroy');

      //optional route for if someone hit the direte link of delete
   Route::get('/jobs/delete/{id}', function () {
    return redirect()->route('employer.jobs.index')
        ->with('error', 'Invalid request. Direct access is not allowed.');
   });

   Route::get('/jobs/trash',[JobController::class, 'trash'])->name('jobs.trash');
   Route::patch('/jobs/restore/{id}',[JobController::class, 'restore'])->name('job.restore');
   
     //optional route for if someone hit the direte link of delete
   Route::get('/jobs/restore/{id}', function () {
    return redirect()->route('employer.jobs.index')
        ->with('error', 'Invalid request. Direct access is not allowed.');
   });
   

   Route::delete('/jobs/force-delete/{id}',[JobController::class, 'forceDelete'])->name('job.forceDelete');

   //optional route for if someone hit the direte link of delete
   Route::get('/jobs/force-delete/{id}', function () {
    return redirect()->route('employer.jobs.index')
        ->with('error', 'Invalid request. Direct access is not allowed.');
   });

   Route::get('/jobs/applications/{id}',[JobController::class, 'jobApplication'])->name('job.applications');



    //profile update
    Route::get('/profile', [EmployerProfileController::class, 'edit'])->name('profile.edit')->middleware('auth:employer');
    Route::put('/profile', [EmployerProfileController::class, 'update'])->name('profile.update')->middleware('auth:employer');
    
    //password update
    Route::get('/password', [EmployerProfileController::class, 'editPassword'])->name('password.edit')->middleware('auth:employer');
    Route::put('/password', [EmployerProfileController::class, 'updatePassword'])->name('password.update')->middleware('auth:employer');

 

    Route::post('/logout', [EmployerAuthController::class, 'logout'])->name('logout');

});

