<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();  // Fetch all students from the database
        return view('students.index', compact('students'));  // Pass data to the view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:students',
            'age' => 'required|integer',
            'course' => 'required|string|max:255',
        ]);

        // Create a new student
        Student::create($request->all());

        // Redirect back to the students list with a success message
        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }
}