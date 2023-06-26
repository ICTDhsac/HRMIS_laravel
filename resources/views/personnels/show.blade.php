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
    <script type="text/javascript">
        $(function() {
        
            var start = moment().subtract(0, 'days');
            var end = moment();
        
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                $('#start_date').val(start.format('MM-DD-YYYY'));
                $('#end_date').val(end.format('MM-DD-YYYY'));
            }
        
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
        
            cb(start, end);
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
                    <input class="btn btn-primary mx-2" type="submit" value="Submit">
                </form>
            </div>
            <table class="table table-striped table-hover table-bordered table-dark">
                <thead>
                    <th>Record Date</th>
                    <th>TIME IN</th>
                    <th>BREAK OUT</th>
                    <th>BREAK IN</th>
                    <th>TIME OUT</th>
                    <th>TOTAL WORK HOURS</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $time_in ? $time_in->RecordDate : 'No Data' }}</td>
                        <td>{{ $time_in ? $time_in->TimeLogStamp : 'No Data' }}</td>
                        <td>{{ $break_out ? $break_out->TimeLogStamp : 'No Data' }}</td>
                        <td>{{ $break_in ? $break_in->TimeLogStamp : 'No Data' }}</td>
                        <td>{{ $time_out ? $time_out->TimeLogStamp : 'No Data' }}</td>
                        <td>{{ $total_hrs }} <i>h:m:s</i></td>
                    </tr>
                </tbody>
            </table>
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
