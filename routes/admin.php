<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\CategoryController;
Route::prefix('admin')->name('admin.')->group(function () {

    //Auth Route
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest:admin');;
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth:admin')->name('dashboard');

    //Profile Update
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit')->middleware('auth:admin');
    Route::put('/profile', [AdminProfileController::class, 'updateProfile'])->name('profile.update')->middleware('auth:admin');

    // Password change
    Route::get('/password', [AdminProfileController::class, 'editPassword'])->name('password.edit')->middleware('auth:admin');
    Route::put('/password', [AdminProfileController::class, 'updatePassword'])->name('password.update')->middleware('auth:admin');

    // Category Route
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.list');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
  
   //Jobs

    Route::get('/pending/jobs/',[AdminJobController::class,'pendingJobsForApproval'])->name('pending.jobs')->middleware('auth:admin');
    Route::get('/job/{job}', [AdminJobController::class, 'show'])->name('job.show');
    Route::patch('/job/{job}/approve/',[AdminJobController::class,'approveJob'])->name('job.approve')->middleware('auth:admin');
    Route::patch('/job/reject/{job}', [AdminJobController::class, 'reject'])->name('job.reject');
    Route::delete('/job/{job}', [AdminJobController::class, 'destroy'])->name('job.destroy');
    Route::get('/trashed/jobs/',[AdminJobController::class,'trashedJobs'])->name('trashed.jobs')->middleware('auth:admin');
    Route::post('/job/restore/{job}', [AdminJobController::class, 'restore'])->name('job.restore');
    Route::delete('/job/parmanentdelete/{id}',[AdminJobController::class,'forceDelete'])->name('job.forceDelete')->middleware('auth:admin');



});

 Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
