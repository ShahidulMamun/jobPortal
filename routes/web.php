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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/job/apply/{job}', [HomeController::class, 'apply'])->name('job.apply');

});

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';

require __DIR__.'/employer.php';