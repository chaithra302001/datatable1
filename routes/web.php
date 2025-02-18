<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Show job listings
//Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');

// Fetch job data (for DataTables or AJAX)
//Route::get('jobs/data', [JobController::class, 'getJobs'])->name('jobs.data');

// Store new job
//Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');

Route::get('/jobs', [JobController::class, 'index']); // Show the job form
Route::get('/jobs/data', [JobController::class, 'getJobs']); // Get jobs data
Route::post('/jobs', [JobController::class, 'store']); // Store a new job

// Default welcome route (if you still need it)
Route::get('/', function () {
    return view('welcome');
});
