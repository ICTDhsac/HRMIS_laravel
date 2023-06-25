<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="container mt-3">
            <div class="d-flex justify-content-between align-items-center"">
                <h1>Personnel Information</h1>
                <a class="btn btn-secondary" href="/">Back</a>
            </div>
            <hr />
            <p><b class="mx-3">Access Number:</b> {{ $personnel_info->AccessNumber }}</p>
            <p><b class="mx-3">Full Name: </b> {{ $personnel_info->FirstName }} {{ $personnel_info->MiddleName }} {{ $personnel_info->LastName }}</p>
            <hr />
            <table class="table table-striped table-hover table-bordered table-dark">
                <thead>
                    <th>Record Date</th>
                    <th>Log Type</th>
                    <th>Time Log Stamp</th>
                </thead>
                <tbody>
@foreach ($personnel_timelogs as $time_log)
                    <tr>
                        <td>{{ $time_log->RecordDate }}</td>
                        <td>{{ $time_log->LogType }}</td>
                        <td>{{ $time_log->TimeLogStamp }}</td>
                    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>


{{-- @php
    $filteredLogs = $personnel_timelogs->where('RecordDate', '06/23/2023')
                                ->where('LogType', 'IN')
                                    ->first();
@endphp

@if ($filteredLogs)
    <p>{{ $filteredLogs->RecordDate }} - {{ $filteredLogs->TimeLogStamp }}</p>
@endif --}}


{{-- @php
    $filteredLogs = $personnel_timelogs->where('RecordDate', '06/23/2023')
                                ->where('LogType', 'OUT')
                                ->last();
@endphp

@if ($filteredLogs)
    <p>{{ $filteredLogs->LogType }}</p>
@endif --}}
