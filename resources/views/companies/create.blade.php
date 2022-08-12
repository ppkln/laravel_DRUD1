<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Add New User</h2>
            </div>
            <div>
                <a href="{{ route('companies.index') }}" class="btn btn-success">Back</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Company Name</strong>
                            <input type="text" name="name" class="form-control" placeholder="Company Name">
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Company email</strong>
                            <input type="email" name="email" class="form-control" placeholder="Company email">
                            @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <div class="form-group">
                            <strong>Company Address</strong>
                            <input type="text" name="address" class="form-control" placeholder="Company Address">
                            @error('address')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-2 me-2">Submit</button>
                        <button type="reset" class="btn btn-danger mt-2 me-2">Clear</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>
</html>