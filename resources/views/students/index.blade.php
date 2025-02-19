<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table thead {
            background-color: #343a40;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .modal-header {
            background-color: #007bff;
            color: #fff;
        }
        .modal-footer .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .modal-footer .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Students List</h1>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody id="studentsTableBody">
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->course }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add Student Button -->
    <div class="text-center mt-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudentModal">
            Add Student
        </button>
    </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addStudentForm" method="POST" action="{{ route('students.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="studentName">Name</label>
                        <input type="text" class="form-control" id="studentName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="studentEmail">Email</label>
                        <input type="email" class="form-control" id="studentEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="studentAge">Age</label>
                        <input type="number" class="form-control" id="studentAge" name="age" required>
                    </div>
                    <div class="form-group">
                        <label for="studentCourse">Course</label>
                        <input type="text" class="form-control" id="studentCourse" name="course" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>