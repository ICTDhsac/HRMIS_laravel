<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTimeZone;

class Personnel extends Model
{
    use HasFactory;

    protected $connection = "sqlsrv";

    public function timelogs(){
        return $this->hasMany(TimeLog::class, 'AccessNumber', 'AccessNumber');
    }
    
    public function getPersonnelTimelogs($start_date, $end_date, $dates){
        $time_logs=  $this->timelogs()
                        ->select('Id', 'DateCreated', 'RecordDate', 'TimeLogStamp', 'LogType', 'AccessNumber')
                        ->whereBetween('RecordDate', [$start_date, $end_date])
                        ->orderBy('DateCreated')
                        ->get()
                        ->map(function ($timelog) {
                            $timelog->RecordDate = Carbon::parse($timelog->RecordDate)->format('m-d-Y');
                            $timelog->TimeLogStamp = Carbon::parse($timelog->TimeLogStamp)->format('H:i:s');
                            return $timelog;
                        });

        $filtered_logs = $time_logs->groupBy('RecordDate')->map(function ($logsByDate) {
            return $logsByDate->groupBy('LogType')->map(function ($logsByType) {
                if ($logsByType->first()->LogType === 'BREAK OUT' || $logsByType->first()->LogType === 'OUT') {
                    return $logsByType->last();
                } else {
                    return $logsByType->first();
                }
            });
        });

        // dd($filtered_logs);
    
        return $filtered_logs;
    }

    
    // public function getFormattedTimelogsToday(){
    //     $today = Carbon::now(new DateTimeZone('Asia/Manila'))->toDateString(); // Get today's date in the Philippine time zone
    
    //     return $this->timelogs()
    //         ->whereDate('RecordDate', $today) // Filter by today's date
    //         ->orderBy('DateCreated')
    //         ->get()
    //         ->map(function ($timelog) {
    //             $timelog->RecordDate = Carbon::parse($timelog->RecordDate)->format('F d, Y');
    //             $timelog->TimeLogStamp = Carbon::parse($timelog->TimeLogStamp)->format('H:i:s');
    //             return $timelog;
    //         });
    // }

}
