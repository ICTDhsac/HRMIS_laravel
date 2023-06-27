<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Employee Record</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    {{-- Date Range Picker --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Public assets --}}
    <script type="text/javascript" src="{{ asset('js/timeLogs.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('personnel.time_logs', ['id' => $personnel_info->Id]) }}",
                type: "GET",
                success: function (response) {
                    $('#result').html(response);
                },
                error: function (xhr) {
                    // Handle any errors
                }
            });
        });
    </script>
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
            <div class="d-flex justify-content-end">
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                </div>
                <form action="{{ route('personnel.time_logs', ['id' => $personnel_info->Id]) }}" method="post">
                    <input type="hidden" name="start_date" id="start_date">
                    <input type="hidden" name="end_date" id="end_date">
                    @csrf
                </form>
            </div>
            <div id="result"></div>
        </div>
    </body>
</html>

{{-- @php
    $filteredLogs = $personnel_timelogs->where('RecordDate', '06/26/2023')
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

{{-- @foreach ($personnel_timelogs as $time_log) --}}
{{-- @endforeach --}}
