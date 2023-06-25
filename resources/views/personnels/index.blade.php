<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="container mt-3">
            <h1>HSAC Personnels</h1>
            <table class="table table-striped table-hover table-bordered table-dark">
                <thead>
                    <th>Access Number</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Time Logs</th>
                </thead>
                <tbody>
@foreach ($personnels as $personnel)
                    <tr>
                        <td>{{ $personnel->AccessNumber }}</td>
                        <td>{{ $personnel->FirstName }}</td>
                        <td>{{ $personnel->MiddleName }}</td>
                        <td>{{ $personnel->LastName }}</td>
                        <td>
                            <a class="btn btn-primary" href="/personnel/{{$personnel->Id}}">View Time Logs</a>
                            {{-- <a class="btn btn-info" href="">Edit</a>
                            <a class="btn btn-danger" href="">Delete</a> --}}
                        </td>
                    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>