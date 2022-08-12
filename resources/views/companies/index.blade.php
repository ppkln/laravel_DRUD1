<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Laravel 9 CRUD Example</h2>
            </div>
            <div>
                <a href="{{ route('companies.create') }}" class="btn btn-success">Create Company</a>
            </div>
            @if($message=Session::get('success'))
                <div class="alert alert-success">
                    <p>{{$message}}</p>
                </div>
            @endif

            <table class="table table-bordered mt-2">
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Company email</th>
                    <th class="text-center">Company Address</th>
                    <th class="text-center" width="280px" >Action</th>
                </tr>
                @foreach($companies as $company)
                <tr>
                    <td class="text-center">{{$company->id}}</td>
                    <td class="text-center">{{$company->name}}</td>
                    <td class="text-center">{{$company->email}}</td>
                    <td class="text-center">{{$company->address}}</td>
                    <td class="text-center">
                        <form action="{{route('companies.destroy',$company->id)}}" method="POST">
                            <a href="{{route('companies.edit',$company->id)}}" class="btn btn-warning me-2">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger me-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {!! $companies->links('pagination::bootstrap-5') !!}
        </div>
    </div>    

</body>
</html>