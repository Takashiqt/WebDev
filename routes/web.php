<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Ensure this import is present
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Redirect the root URL to the login page if not authenticated
Route::get('/', function () {
    if (Auth::check()) { // Use the Auth facade directly
        return redirect()->route('students.index');
    }
    return redirect()->route('login');
})->name('home');

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

// Registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);