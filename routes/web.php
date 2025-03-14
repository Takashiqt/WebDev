<?php
// filepath: c:\xampp\htdocs\activity 4\WebDev\routes\web.php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;

// Redirect the root URL to the Students page
Route::get('/', [StudentController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Define route for Students page (if it's a separate page)
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');

    // Define route for storing new student
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    // Define routes for editing and updating a student
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

    // Define route for deleting a student
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Logout route
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Authentication routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);