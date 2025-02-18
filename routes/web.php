<?php

use App\Models\Student;

Route::get('/students', function () {
    $students = Student::all();  // Fetch all students from the database
    return view('students.index', compact('students'));  // Pass the data to the view
});

