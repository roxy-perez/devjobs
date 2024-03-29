<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacancyController::class, 'index'])->middleware(['auth', 'verified', 'role.recruiter'])->name('vacancy.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->middleware('auth')->name('vacancy.create');
Route::get('/vacancies/{vacancy}', [VacancyController::class, 'show'])->name('vacancy.show');
Route::put('/vacancies/{vacancy}', [VacancyController::class, 'update'])->middleware(['auth', 'verified'])->name('vacancy.update');
Route::get('/vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacancy.edit');
Route::get('/candidates/{vacancy}', [App\Http\Controllers\CandidateController::class, 'index'])->name('candidates.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/notifications', [App\Http\Controllers\NotificationController::class, '__invoke'])->middleware(['auth', 'verified', 'role.recruiter'])->name('notifications');

require __DIR__ . '/auth.php';
