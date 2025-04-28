<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Users</title>
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
        #form{
            position: relative;
            bottom: 370px;
            width: 100px;
            left: 370px;
        }
    </style>
    
</head>
<body>

    <div class="container">
        <div class="form-container shadow-lg p-3 mb-5 bg-body rounded">

            <form action="{{ route('AddUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                <h2>User Details</h2>
            
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ $userDetails->name ?? '' }}">
                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Date of Birth</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="dob" value="{{ $userDetails->dob ?? '' }}">
                        @error('dob')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                        <input type="radio" name="gender" value="male" {{ isset($userDetails) && $userDetails->gender == 'male' ? 'checked' : '' }}> Male
                        <input type="radio" name="gender" value="female" {{ isset($userDetails) && $userDetails->gender == 'female' ? 'checked' : '' }}> Female
                        @error('gender')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Course</label>
                    <div class="col-sm-10">
                        <select name="course" class="form-control">
                            <option value="">--Select Programming Language--</option>
                            <option value="PHP" {{ isset($userDetails) && $userDetails->course == 'PHP' ? 'selected' : '' }}>PHP</option>
                            <option value="Python" {{ isset($userDetails) && $userDetails->course == 'Python' ? 'selected' : '' }}>Python</option>
                            <option value="Java" {{ isset($userDetails) && $userDetails->course == 'Java' ? 'selected' : '' }}>Java</option>
                        </select>
                        @error('course')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            <form method="POST" id="form" action="{{ route('logout') }}">
                @csrf
                <button type="submit" id="btn" class="btn btn-danger">Logout</button>
            </form>
            
            
        </div>
    </div>
</body>
</html>