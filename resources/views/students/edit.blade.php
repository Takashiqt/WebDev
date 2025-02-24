<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Student</h1>

    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="studentName">Name</label>
            <input type="text" class="form-control" id="studentName" name="name" value="{{ $student->name }}" required>
        </div>
        <div class="form-group">
            <label for="studentEmail">Email</label>
            <input type="email" class="form-control" id="studentEmail" name="email" value="{{ $student->email }}" required>
        </div>
        <div class="form-group">
            <label for="studentAge">Age</label>
            <input type="number" class="form-control" id="studentAge" name="age" value="{{ $student->age }}" required>
        </div>
        <div class="form-group">
            <label for="studentCourse">Course</label>
            <input type="text" class="form-control" id="studentCourse" name="course" value="{{ $student->course }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>