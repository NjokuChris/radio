<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/findSchedule', [App\Http\Controllers\Admin\ScheduleController::class, 'getSchedule']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/admin/schedule', App\Http\Controllers\Admin\ScheduleController::class);
Route::resource('/admin/station', App\Http\Controllers\Admin\StationController::class);

Route::get('/schedule_show', [App\Http\Controllers\Admin\ScheduleController::class, 'ScheduleShow'])->name('schedule_show');


require __DIR__.'/auth.php';
