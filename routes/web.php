<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\JobPost;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/user/register', [HomeController::class, 'registerPage'])->name('register.page');

Route::get('/', [HomeController::class, 'index']);
Route::get('/jobs/{job:slug}', [HomeController::class, 'show'])->name('jobs.show');
// Route::get('/', function () {
//      return view('home', compact('jobs'));
// });

Route::get('candidate/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('candidate.dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/candidate/profile', [ProfileController::class, 'candidateProfile'])->name('candidate.profile');
    
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/job/apply/{job}', [HomeController::class, 'apply'])->name('job.apply');

});

 
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [JobController::class, 'show'])->name('jobs.show');
Route::middleware(['auth', 'role:candidate'])->prefix('candidate')->name('candidate.')->group(function () {
 
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
 
   
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
 
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
 
    Route::get('/saved-jobs', [SavedJobController::class, 'index'])->name('saved');
    Route::post('/saved-jobs/{job}', [SavedJobController::class, 'toggle'])->name('saved.toggle');
 
    Route::get('/job-alerts', [JobAlertController::class, 'index'])->name('alerts');
    Route::post('/job-alerts', [JobAlertController::class, 'store'])->name('alerts.store');
    Route::delete('/job-alerts/{alert}', [JobAlertController::class, 'destroy'])->name('alerts.destroy');
 
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');
 
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
 
});
 

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';

require __DIR__.'/employer.php';


