<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\ReportController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');

Route::middleware('auth.admin')->group(function () {
    Route::get('/admin/dashboard', function() {
        return "Dashboard Admin";
    })->name('dashboard.admin');
});

Route::middleware('auth.student')->group(function () {
    Route::get('/', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::get('/laporan/buat', [ReportController::class, 'create'])->name('laporan.create');
    Route::post('/laporan/store', [ReportController::class, 'store'])->name('laporan.store');
});
