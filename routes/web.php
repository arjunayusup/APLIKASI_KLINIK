<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CheckupController;
use App\Http\Controllers\PrescriptionController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Medicine Routes (accessible by all authenticated users)
Route::resource('medicines', MedicineController::class)->middleware('auth');

// Patient Routes (only for registration staff)
Route::middleware(['auth', 'registration'])->group(function () {
    Route::resource('patients', PatientController::class);
});

// Checkup Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('checkups', CheckupController::class)->except(['create', 'store']);
    
    // Nurse can create checkups
    Route::middleware(['nurse'])->group(function () {
        Route::get('checkups-create', [CheckupController::class, 'create'])->name('checkups.create');
        Route::post('checkups', [CheckupController::class, 'store'])->name('checkups.store');
    });
    
    // Prescription Routes (only for pharmacist)
    Route::middleware(['pharmacist'])->group(function () {
        Route::get('checkups/{checkup}/prescriptions/create', [PrescriptionController::class, 'create'])->name('prescriptions.create');
        Route::post('checkups/{checkup}/prescriptions', [PrescriptionController::class, 'store'])->name('prescriptions.store');
    });
});

// Home Redirect
Route::redirect('/', '/login');