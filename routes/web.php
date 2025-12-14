<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminDashboardController;

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');

// Admin Routes
Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.admin');
    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('admin.reports');
    Route::put('/reports/{report}', [AdminDashboardController::class, 'updateStatus'])->name('admin.reports.update');
    Route::get('/logout', [LoginController::class, 'logoutAdmin'])->name('admin.logout');
});

// Student Routes
Route::middleware('auth.student')->group(function () {
    Route::get('/', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::get('/laporan/buat', [ReportController::class, 'create'])->name('laporan.create');
    Route::post('/laporan/store', [ReportController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/history', [ReportController::class, 'history'])->name('laporan.history');
    Route::get('/laporan/{report}', [ReportController::class, 'show'])->name('laporan.show');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
