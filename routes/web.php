<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Redirect the root URL to the Students page
Route::get('/', [StudentController::class, 'index'])->name('students.index');

// Define route for Students page (if it's a separate page)
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Define route for storing new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');