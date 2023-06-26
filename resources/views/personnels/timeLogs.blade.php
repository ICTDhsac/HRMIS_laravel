<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Time Logs</title>
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

</head>
    <body>
        <div class="container mt-3">
            {{-- <h1>{{ $personnel_timelogs['06-15-2023']['IN']->Id }}</h1> --}}
            <table class="table table-striped table-hover table-bordered table-dark text-center">
                <thead>
                    <th>Record Date</th>
                    <th>IN</th>
                    <th>BREAK OUT</th>
                    <th>BREAK IN</th>
                    <th>TIME OUT</th>
                    {{-- <th>TOTAL WORK HOURS</th> --}}
                </thead>
                <tbody>
@foreach($dates as $date)
                    <tr>
                        <td>{{ $date }}</td>
                    @if (isset($personnel_timelogs[$date]))
                        <td>{!! isset($personnel_timelogs[$date]['IN']) ? $personnel_timelogs[$date]['IN']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>"; !!}</td>
                        <td>{!! isset($personnel_timelogs[$date]['BREAK OUT']) ? $personnel_timelogs[$date]['BREAK OUT']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>"; !!}</td>
                        <td>{!! isset($personnel_timelogs[$date]['BREAK IN']) ? $personnel_timelogs[$date]['BREAK IN']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>";!!}</td>
                        <td>{!! isset($personnel_timelogs[$date]['OUT']) ? $personnel_timelogs[$date]['OUT']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>"; !!}</td>
                        {{-- <td>{{ $total_hrs }} <i>h:m:s</i></td> --}}
                    @else
                        <td class="text-danger" style="text-align: left;"" colspan="4"><i>No time logs available for this date</i></td>
                    @endif
                    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
