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
use DateTimeZone;

class HomeController extends Controller
{

    public function index(){

        // $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->get();
        $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->where('isDeleted', 0)->get();
        
        return view('personnels.index', ['personnels' => $personnels]);
        
    }

    public function show($id){
        $personnel_info = Personnel::find($id);
        return view('personnels.show', compact('personnel_info'));
    }


    public function time_logs(Request $request, $id){
        $start_date = Carbon::now()->format('Y-m-d');
        $end_date = Carbon::now()->format('Y-m-d');
        if ($request->filled('start_date')) {
            $start_date = Carbon::createFromFormat('m-d-Y', $request->input('start_date'))->format('Y-m-d');
        }
    
        if ($request->filled('end_date')) {
            $end_date = Carbon::createFromFormat('m-d-Y', $request->input('end_date'))->format('Y-m-d');
        }
        
        $dates = [];
        $period = CarbonPeriod::create($start_date, $end_date)->toArray();
        foreach ($period as $date) {
            $dates[] = $date->format('m-d-Y');
        }
        $personnel_timelogs = Personnel::find($id)->getPersonnelTimelogs($start_date, $end_date, $dates);

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
