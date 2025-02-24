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
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="studentsTableBody">
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->course }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStudentModal" data-id="{{ $student->id }}" data-name="{{ $student->name }}" data-email="{{ $student->email }}" data-age="{{ $student->age }}" data-course="{{ $student->course }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteStudentModal" data-id="{{ $student->id }}">
                            Delete
                        </button>
                    </td>
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
                        <input type="text" class="form-control" id="studentName" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="studentEmail">Email</label>
                        <input type="email" class="form-control" id="studentEmail" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="studentAge">Age</label>
                        <input type="number" class="form-control" id="studentAge" name="age" placeholder="Enter age" required>
                    </div>
                    <div class="form-group">
                        <label for="studentCourse">Course</label>
                        <input type="text" class="form-control" id="studentCourse" name="course" placeholder="Enter course" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editStudentName">Name</label>
                        <input type="text" class="form-control" id="editStudentName" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="editStudentEmail">Email</label>
                        <input type="email" class="form-control" id="editStudentEmail" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="editStudentAge">Age</label>
                        <input type="number" class="form-control" id="editStudentAge" name="age" placeholder="Enter age" required>
                    </div>
                    <div class="form-group">
                        <label for="editStudentCourse">Course</label>
                        <input type="text" class="form-control" id="editStudentCourse" name="course" placeholder="Enter course" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Student Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this student?
            </div>
            <div class="modal-footer">
                <form id="deleteStudentForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('#deleteStudentModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var studentId = button.data('id');
        var form = $('#deleteStudentForm');
        form.attr('action', '{{ url('students') }}/' + studentId);
    });

    $('#editStudentModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var studentId = button.data('id');
        var studentName = button.data('name');
        var studentEmail = button.data('email');
        var studentAge = button.data('age');
        var studentCourse = button.data('course');
        var form = $('#editStudentForm');
        form.attr('action', '{{ url('students') }}/' + studentId);
        $('#editStudentName').val(studentName);
        $('#editStudentEmail').val(studentEmail);
        $('#editStudentAge').val(studentAge);
        $('#editStudentCourse').val(studentCourse);
    });
</script>
</body>
</html>