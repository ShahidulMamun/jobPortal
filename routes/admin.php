<?php
use App\Http\Controllers\Admin\AuthController;

Route::prefix('admin')->name('admin.')->group(function () {

    //Auth Route
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest:admin');;
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth:admin')->name('dashboard');

    //Profile Update
    Route::get('/profile', [App\Http\Controllers\Admin\AdminProfileController::class, 'edit'])->name('profile.edit')->middleware('auth:admin');
    Route::put('/profile', [App\Http\Controllers\Admin\AdminProfileController::class, 'updateProfile'])->name('profile.update')->middleware('auth:admin');

    // Password change
    Route::get('/password', [App\Http\Controllers\Admin\AdminProfileController::class, 'editPassword'])->name('password.edit')->middleware('auth:admin');
    Route::put('/password', [App\Http\Controllers\Admin\AdminProfileController::class, 'updatePassword'])->name('password.update')->middleware('auth:admin');
});

 Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
