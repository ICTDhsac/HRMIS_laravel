<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Employee;
use App\Models\Personnel;
use App\Models\TimeLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class HomeController extends Controller
{

    public function index(){

        // $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->get();
        $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->where('isDeleted', 0)->get();
        
        return view('personnels.index', ['personnels' => $personnels]);
        
    }

    public function show($id){
        $personnel_info = Personnel::find($id);
        $personnel_timelogs = $personnel_info->getFormattedTimelogsToday();
        $time_in = $personnel_timelogs->where('LogType', 'IN')->first();
        $time_out = $personnel_timelogs->where('LogType', 'OUT')->first();

        $total_hrs = null;

        if ($time_in && $time_out) {
            $time_in_carbon = Carbon::parse($time_in->TimeLogStamp);
            $time_out_carbon = Carbon::parse($time_out->TimeLogStamp);
            $total_hrs = $time_in_carbon->diff($time_out_carbon)->format('%H:%I:%S');
        }

        $data = array(
            'personnel_info' => $personnel_info,
            'time_in' => $time_in,
            'time_out' => $time_out,
            'break_in' => $personnel_timelogs->where('LogType', 'BREAK IN')->first(),
            'break_out' => $personnel_timelogs->where('LogType', 'BREAK OUT')->first(),
            'total_hrs' => $total_hrs,
        );

        return view('personnels.show', $data);
        // return view('personnels.show', compact('personnel_info', 'personnel_timelogs'));
    }

    public function time_logs(Request $request, $id){
        $personnel_info = Personnel::find($id);
        $start_date = Carbon::createFromFormat('m-d-Y', $request->input('start_date'))->format('Y-m-d');
        $end_date = Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');

        $personnel_timelogs = $personnel_info->getPersonnelTimelogs($start_date, $end_date);

        $dates = [];
        $period = CarbonPeriod::create(Carbon::createFromFormat('m-d-Y', $request->input('start_date'))->startOfDay(),
                                    Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->endOfDay());
        foreach ($period as $date) {
            $dates[] = $date->format('m-d-Y');
        }
        // return $personnel_timelogs;
        return view('personnels.timeLogs', compact('dates','personnel_timelogs'));
    }























    // public function addArticle(){
        
    //     Article::create([

    //         'title' => 'Life is a gift!',
    //         'author' => 'William',
    //         'description' => 'Here is the description',
    //     ]);

    //     return "The Article has been added!";
    // }

    // public function addEmployee(){
        
    //     Employee::create([

    //         'first_name' => 'Mark Oliver',
    //         'last_name' => 'Roman',
    //         'email' => 'oliver@email.com',
    //         'address' => 'Camarin Caloocan City',
    //     ]);

    //     return "The Employee has been added!";

    // }
}
