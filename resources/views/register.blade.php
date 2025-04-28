<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
    <style>
        .form-container{
            width: 45%;
            position: relative;
            left: 27%;
            top: 100px;
        }
        h2{
            text-align: center;
            padding-bottom: 10px;
        }
        button{
            position: relative;
            left: 45%;
            padding-bottom: 10px;
        }
        p{
            text-align: center;
            padding-top:10px; 
        }
        .row{
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container shadow-lg p-3 mb-5 bg-body rounded">
            <h2>Register</h2>
            <form action="{{route('Register')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password">
                        @error('password')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>

                <p>Already have an account!<a href="/login">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>