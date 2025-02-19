<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();  // Fetch all students from the database
        return view('students.index', compact('students'));  // Pass data to the view
    }
}