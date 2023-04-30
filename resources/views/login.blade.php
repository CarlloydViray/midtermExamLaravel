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

    <title>Login</title>
</head>

<body style="background-color: #9BA4B5">

    @if ($errors->has('error'))
        <center>
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        </center>
    @endif
    <br><br><br>

    <div class="d-flex justify-content-center">
        <div class="card" style="width: 700px">
            <img class="card-img-top" src="{{ url('images/logo.png') }}" alt="">
            <div class="card-body" style="background-color: #F1F6F9">
                <h1 class="card-title">Log In</h1>
                <div class="card-text">
                    <form action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" placeholder="Enter Username" name="username"
                                value="{{ old('username') }}" class="form-control">
                            @error('username')
                                <span class="mb-3" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" placeholder="Enter Password" name="password"
                                value="{{ old('password') }}" class="form-control">
                            @error('password')
                                <span class="mb-3" style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        <div class="d-grid">
                            <input class="btn btn-block btn-success" type="submit" value="Login">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
