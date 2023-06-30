            <table class="table table-striped table-hover table-bordered text-center">
                <thead>
                    <th>Record Date</th>
                    <th>TIME IN</th>
                    <th>BREAK OUT</th>
                    <th>BREAK IN</th>
                    <th>TIME OUT</th>
                    <th>TOTAL WORK HOURS</th>
                </thead>
                <tbody>
@foreach($dates as $date)
                    <tr>
                        <td class="align-middle">{{ $date }}</td>
    @if (isset($personnel_timelogs[$date]))
                        <td class="align-middle">{!! isset($personnel_timelogs[$date]['IN']) ? $personnel_timelogs[$date]['IN']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>"; !!}</td>
                        <td class="align-middle">{!! isset($personnel_timelogs[$date]['BREAK OUT']) ? $personnel_timelogs[$date]['BREAK OUT']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>"; !!}</td>
                        <td class="align-middle">{!! isset($personnel_timelogs[$date]['BREAK IN']) ? $personnel_timelogs[$date]['BREAK IN']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>";!!}</td>
                        <td class="align-middle">{!! isset($personnel_timelogs[$date]['OUT']) ? $personnel_timelogs[$date]['OUT']->TimeLogStamp : "<i class='text-warning'>NO DATA</i>"; !!}</td>
                            
                            {{-- Calculate the difference --}}
        @if (isset($personnel_timelogs[$date]['IN']) && isset($personnel_timelogs[$date]['OUT']))
            @php
                $inTime = Carbon\Carbon::parse($personnel_timelogs[$date]['IN']->TimeLogStamp);
                $outTime = Carbon\Carbon::parse($personnel_timelogs[$date]['OUT']->TimeLogStamp);
                $timeDiff = $outTime->diff($inTime)->format('%H:%I:%S');
                $status = "text-success";

                if (isset($personnel_timelogs[$date]['BREAK IN']) && isset($personnel_timelogs[$date]['BREAK OUT'])) {
                    $breakInTime = Carbon\Carbon::parse($personnel_timelogs[$date]['BREAK IN']->TimeLogStamp);
                    $breakOutTime = Carbon\Carbon::parse($personnel_timelogs[$date]['BREAK OUT']->TimeLogStamp);
                    $breakTimeDiff = $breakOutTime->diff($breakInTime)->format('%H:%I:%S');

                    // Subtract break time difference from the total time difference
                    $timeDiffwithBreak = Carbon\CarbonInterval::createFromFormat('H:i:s', $timeDiff)->subtract(Carbon\CarbonInterval::createFromFormat('H:i:s', $breakTimeDiff))->format('%H:%I:%S');
                    // Check if the break time difference is greater than the total time difference
                    
                    if (strtotime($breakTimeDiff) > strtotime($timeDiff)) {
                        $status = "text-danger";
                        $timeDiffwithBreak = "-". $timeDiffwithBreak ;
                    }
                } else {
                    $breakTimeDiff = "00:00:00";
                    $timeDiffwithBreak = $timeDiff;
                }
            @endphp
                        <td class="{{$status}}">(Work Hours: {{ $timeDiff }} - Break: {{ $breakTimeDiff}})<br> Total: {{$timeDiffwithBreak}}</td>
        @else
                        <td><i class='text-warning'>NO DATA</i></td>
        @endif
                        
    @else
                        <td class="text-danger" colspan="5"><i>No time logs available for this date</i></td>
    @endif
                    </tr>
@endforeach
                
                </tbody>
            </table>
