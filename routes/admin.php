<?php
use App\Http\Controllers\Admin\AuthController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest:admin');;
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth:admin')->name('dashboard');
});

 Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
