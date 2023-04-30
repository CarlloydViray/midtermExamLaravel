<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <title>Edit</title>
</head>

<body style="background-color: #9BA4B5">
    <br><br><br><br>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 1500px">
            <div class="card-body" style="background-color: #F1F6F9">
                <div class="card-title" style="background-color: #212A3E; color: white">
                    <br>
                    <center>
                        <h1>Edit Employee</h1>
                    </center>
                    <br>
                </div>
                <div class="card-text">
                    @foreach ($employee as $employees)
                        <form action="{{ $employees->emp_id }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="Name"
                                    value="{{ $employees->emp_name }}">
                                @error('Name')
                                    <span class="mb-3" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="Address"
                                    value="{{ $employees->emp_address }}" class="form-select">
                                @error('Address')
                                    <span class="mb-3" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select name="Department" class="form-select">
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
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="Email"
                                    value="{{ $employees->emp_email }}">
                                @error('Email')
                                    <span class="mb-3" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-gorup">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" placeholder="Enter Contact Number"
                                    name="ContactNumber" value="{{ $employees->emp_contactNum }}">
                                @error('ContactNumber')
                                    <span class="mb-3" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date Employed</label>
                                <input type="text" class="form-control" placeholder="Enter Date Employed"
                                    name="DateEmployed" value="{{ $employees->emp_dateEmployed }}">
                                @error('DateEmployed')
                                    <span class="mb-3" style="color: red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Position</label>
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
                            </div><br>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-success btn-block" value="Update">
                            </div>

                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container w-50 mx-auto">

    </div>
</body>

</html>
