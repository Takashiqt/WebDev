<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Redirect the root URL to the Students page
Route::get('/', [StudentController::class, 'index'])->name('students.index');

// Define route for Students page (if it's a separate page)
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Define route for storing new student
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Define routes for editing and updating a student
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
//delete
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');