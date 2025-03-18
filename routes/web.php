<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// Referral Routes
Route::controller(ReferralController::class)->group(function () {
    Route::get('referral', 'referral')->name('referral.page');
    Route::post('referral', 'referralstore')->name('referralstore');
    Route::get('referral-register', 'LoadReferralRegister')->name('referral.student');
    Route::post('referral-register', 'referstduntstore')->name('referral.student.store');
});

// Email Verification Route
// Route::get('/verify-email/{id}/{hash}', [VerificationController::class, 'verifyEmail']);

// Form Submission Route
// Route::post('/submit-form', [FormController::class, 'store'])->name('submit.form');

// Dashboard Route with Middleware
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
});

// Profile Routes with Middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Clear Cache Route
Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return "Cache Cleared Successfully!";
});

Route::get('/migrate-fresh', function () {
    Artisan::call('migrate:fresh ');
    return "Database Reset & Seeded Successfully!";
});

// Additional Route Files
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
