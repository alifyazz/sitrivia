<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;

// Landing Page
Route::view('/', 'landing')->name('landing');

// Rute untuk autentikasi
Auth::routes(['logout' => true]);

// Rute yang memerlukan autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    // CRUD untuk kuis
    Route::resource('quizzes', QuizController::class);
});
