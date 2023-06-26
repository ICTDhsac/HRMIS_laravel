<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    protected $connection = "sqlsrv";

    protected $table = "TimeLogs";

    public function personnel(){
        return $this->belongsTo(Personnel::class, 'AccessNumber', 'AccessNumber');
    }

}
