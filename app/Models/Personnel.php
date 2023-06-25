<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Personnel extends Model
{
    use HasFactory;

    // protected $connection = "sqlsrv";

    public function timelogs(){
        return $this->hasMany(TimeLog::class, 'AccessNumber', 'AccessNumber');
    }

    public function getFormattedTimelogs(){
        return $this->timelogs()
            ->orderBy('RecordDate')
            ->get()
            ->map(function ($timelog) {
                $timelog->RecordDate = Carbon::parse($timelog->RecordDate)->format('m/d/Y');
                $timelog->TimeLogStamp = Carbon::parse($timelog->TimeLogStamp)->format('H:i:s');
                return $timelog;
            });
    }

}
