<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Employee;
use App\Models\Personnel;
use App\Models\TimeLog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index(){

        // $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->get();
        $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->where('isDeleted', '=', 0)->get();
        
        return view('personnels.index', ['personnels' => $personnels]);
        
    }

    public function show($id){

        $personnel_info = Personnel::where('Id', $id)->first();
        $data = array(
            'personnel_info' => Personnel::where('Id', $id)->first(),
            'personnel_timelogs' => TimeLog::where('AccessNumber', $personnel_info->AccessNumber)
                ->orderBy('RecordDate')
                ->get()
                ->map(function($timelog) {
                    $timelog->RecordDate = Carbon::parse($timelog->RecordDate)->format('m/d/Y');
                    $timelog->TimeLogStamp = Carbon::parse($timelog->TimeLogStamp)->format('H:i:s');
                    return $timelog;
                })
        );
        
        return view('personnels.show', $data);
    }

    public function addArticle(){
        
        Article::create([

            'title' => 'Life is a gift!',
            'author' => 'William',
            'description' => 'Here is the description',
        ]);

        return "The Article has been added!";

    }

    public function addEmployee(){
        
        Employee::create([

            'first_name' => 'Mark Oliver',
            'last_name' => 'Roman',
            'email' => 'oliver@email.com',
            'address' => 'Camarin Caloocan City',
        ]);

        return "The Employee has been added!";

    }
}
