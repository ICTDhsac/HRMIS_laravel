<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('template.nav');
});

Route::get('/users',[UserController::class, 'index']);
Route::get('/register',[UserController::class, 'register']);
Route::get('/store', [UserController::class, 'store']);

Route::get('/login',[SessionsController::class, 'index']);

Route::get('/',[HomeController::class, 'index']);
Route::get('/personnel/{id}', [HomeController::class, 'show'])->name('personnel.show');
Route::match(['get', 'post'], '/get_timelogs/{id}', [HomeController::class, 'time_logs'])->name('personnel.time_logs');
