<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // The name of the table in the database (if different from the model name)
    protected $table = 'students';  // Optional if the table name matches the plural form of the model

    // Define the fillable fields to allow mass assignment
    protected $fillable = ['name', 'email', 'age', 'course'];
}

