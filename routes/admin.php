<?php
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminProfileController;
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


});

 Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
