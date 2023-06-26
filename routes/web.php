<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[HomeController::class, 'index']);
Route::get('/personnel/{id}', [HomeController::class, 'show']);
Route::post('/personnel/{id}', [HomeController::class, 'time_logs'])->name('personnel.time_logs');

//sample 
Route::get('/add-article',[HomeController::class, 'addArticle']);
// Route::get('/add-employee',[HomeController::class, 'addEmployee'], function () {
//     return view('article');
// });