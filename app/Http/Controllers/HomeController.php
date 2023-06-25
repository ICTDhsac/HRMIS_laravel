<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Employee;
use App\Models\Personnel;
use App\Models\TimeLog;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index(){

        // $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->get();
        $personnels = Personnel::orderBy(DB::raw('cast(AccessNumber as int)'))->where('isDeleted', 0)->get();
        
        return view('personnels.index', ['personnels' => $personnels]);
        
    }

    public function show($id){
        $personnel_info = Personnel::find($id);
        $personnel_timelogs = $personnel_info->getFormattedTimelogs();
        
        return view('personnels.show', compact('personnel_info', 'personnel_timelogs'));
    }


    public function addArticle(){
        
        Article::create([

            'title' => 'Life is a gift!',
            'author' => 'William',
            'description' => 'Here is the description',
        ]);

        return "The Article has been added!";

    }

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
