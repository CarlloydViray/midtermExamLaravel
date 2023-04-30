<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>


    {{-- datatable bootsrap --}}
    {{-- css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employees').DataTable();
        });
    </script>

    <title>CRUD</title>
</head>

<body style="background-color: #9BA4B5">

    @if (Session::has('success'))
        <center>
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ Session::get('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        </center>
    @endif

    @if ($errors->any())
        <center>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                One or more fields are empty or has incorrect input.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        </center>
    @endif
    <br><br><br>
    <center>
        <div class="container" style="background-color: #212A3E; width: 30%;color:white">
            <br>
            <h1>Midterm CRUD by Carlloyd Viray</h1>
            <br>
        </div>
    </center>
    <br><br>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 2000px">
            <div class="card-body" style="background-color: #F1F6F9">
                <div class="card-text">
                    <div class="d-grid">
                        <button class="btn btn-block btn-success" type="button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Add Employee</button>
                    </div><br>
                    <table id="employees" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Date Employed</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee as $employees)
                                <tr>

                                    <td>
                                        {{ $employees->emp_id }}
                                    </td>
                                    <td>
                                        {{ $employees->emp_name }}
                                    </td>
                                    <td>
                                        {{ $employees->emp_address }}
                                    </td>
                                    <td>
                                        {{ $employees->emp_department }}
                                    </td>
                                    <td>
                                        {{ $employees->emp_email }}

                                    </td>
                                    <td>
                                        {{ $employees->emp_contactNum }}
                                    </td>
                                    <td>
                                        {{ $employees->emp_dateEmployed }}
                                    </td>
                                    <td>
                                        {{ $employees->emp_position }}
                                    </td>
                                    <td>
                                        <form action="{{ route('employee.destroy', $employees->emp_id) }}"
                                            method="post">
                                            <a class="btn btn-warning" href="/edit/{{ $employees->emp_id }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="/delete/{{ $employees->emp_id }}">Delete</a>
                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Date Employed</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>


                    </table>
                </div>
            </div>
        </div>
    </div>



</body>

{{-- CREATE --}}
<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header" style="background-color: #212A3E; color: white">

                <h5 class="modal-title" id="staticBackdropLabel">ADD EMPLOYEE</h5>

            </div>

            <div class="modal-body" style="background-color: #F1F6F9">
                <form action="{{ route('employee.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">Name:</label>

                        <input type="text" class="form-control" name="Name" value="{{ old('Name') }}"
                            placeholder="Enter Name">
                        @error('Name')
                            <span class="mb-3" style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-3">

                        <label class="form-label">Address:</label>

                        <input type="text" class="form-control" name="Address" value="{{ old('Address') }}"
                            placeholder="Enter Address">
                        @error('Address')
                            <span class="mb-3" style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-3">

                        <label class="form-label">Department:</label>

                        <select name="Department" class="form-select" id="">
                            <option value="">Select Department</option>
                            @foreach ($department as $departments)
                                <option value="{{ $departments->dept_name }}"> {{ $departments->dept_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('Department')
                            <span class="mb-3" style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">

                        <label class="form-label">Email:</label>

                        <input type="text" class="form-control" name="Email" value="{{ old('Email') }}"
                            placeholder="Enter Email">
                        @error('Email')
                            <span class="mb-3" style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-3">

                        <label class="form-label">Contact Number:</label>

                        <input type="text" class="form-control" name="ContactNumber"
                            value="{{ old('ContactNumber') }}" placeholder="Enter Contact Number">
                        @error('ContactNumber')
                            <span class="mb-3" style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-3">

                        <label class="form-label">Date Employed:</label>

                        <input type="text" class="form-control" name="DateEmployed"
                            value="{{ old('DateEmployed') }}" placeholder="mm/dd/yyyy">
                        @error('DateEmployed')
                            <span class="mb-3" style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-3">

                        <label class="form-label">Position:</label>

                        <select name="Position" class="form-select">
                            <option value="">Select Position</option>
                            <option value="Instructor I">Instructor I</option>
                            <option value="Instructor II">Instructor II</option>
                            <option value="Instructor III">Instructor III</option>
                            <option value="Associate Professor I">Associate Professor I</option>
                            <option value="Associate Professor II">Associate Professor II</option>
                            <option value="Associate Professor III">Associate Professor III</option>
                        </select>
                        @error('Position')
                            <span class="mb-3" style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
            </div>

            <div class="modal-footer" style="background-color: #212A3E">

                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                <button type="submit" class="btn btn-success">Create Employee</button>

            </div>

            </form>

        </div>

    </div>

</div>

</html>
