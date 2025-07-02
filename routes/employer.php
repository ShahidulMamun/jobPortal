<?php
use App\Http\Controllers\Employer\EmployerAuthController;
use App\Http\Controllers\Employer\EmployerProfileController;
use App\Http\Controllers\JobPostController;

Route::prefix('employer')->name('employer.')->group(function () {

    Route::get('/register', [EmployerAuthController::class, 'showRegisterForm'])->name('register')->middleware('guest:employer');

    Route::post('/register', [EmployerAuthController::class, 'register'])->name('register.store')->middleware('guest:employer');


    Route::get('/login', [EmployerAuthController::class, 'showLoginForm'])->name('login')->middleware('guest:employer');
    Route::post('/login', [EmployerAuthController::class, 'login'])->name('login');
    Route::get('/dashboard', [EmployerAuthController::class, 'dashboard'])->middleware('auth:employer')->name('dashboard');  


    Route::get('/job-post/create', [JobPostController::class, 'create'])->name('job.create');
    Route::post('/job-post/store', [JobPostController::class, 'store'])->name('job.store');


    Route::get('/profile', [EmployerProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [EmployerProfileController::class, 'update'])->name('profile.update');

    Route::get('/password', [EmployerProfileController::class, 'editPassword'])->name('password.edit');
    Route::put('/password', [EmployerProfileController::class, 'updatePassword'])->name('password.update');


    Route::post('/logout', [EmployerAuthController::class, 'logout'])->name('logout');

});

