<?php

use App\Http\Controllers\AssignStudentCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentConceptController;
use App\Http\Controllers\PlayerStatsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('category', CategoryController::class);
    Route::resource('student', StudentController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('field', FieldController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('paymentConcept', PaymentConceptController::class);
    Route::resource('player_stats', PlayerStatsController::class);
    Route::resource('game', GameController::class);
    Route::resource('tournament', TournamentController::class);
    Route::resource('assignStudent', AssignStudentCategoryController::class);
});

require __DIR__.'/auth.php';
