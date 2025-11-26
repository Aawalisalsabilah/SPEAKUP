<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\StudentLoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [StudentLoginController::class, 'index'])->name('login');
Route::post('/login', [StudentLoginController::class, 'authenticate'])->name('login.process');

Route::get('/', function() {
    return view('student.report.index');
})->middleware('auth.student');
