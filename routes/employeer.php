<?php
use App\Http\Controllers\Employeer\EmployeerAuthController;

use App\Http\Controllers\JobPostController;

Route::prefix('employeer')->name('employeer.')->group(function () {

    Route::get('/register', [EmployeerAuthController::class, 'showRegisterForm'])->name('register')->middleware('guest:employeer');

    Route::post('/register', [EmployeerAuthController::class, 'register'])->name('register.store')->middleware('guest:employeer');


    Route::get('/login', [EmployeerAuthController::class, 'showLoginForm'])->name('login')->middleware('guest:employeer');
    Route::post('/login', [EmployeerAuthController::class, 'login'])->name('login');
    Route::get('/dashboard', [EmployeerAuthController::class, 'dashboard'])->middleware('auth:employeer')->name('dashboard');  


    Route::get('/job-post/create', [JobPostController::class, 'create'])->name('job.create');
    Route::post('/job-post/store', [JobPostController::class, 'store'])->name('job.store');


    Route::post('/logout', [EmployeerAuthController::class, 'logout'])->name('logout');

});

