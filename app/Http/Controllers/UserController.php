<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return "Hello Users Controller!";
    }

    public function login() {

    }

    public function register() {
        return view('users.register');
    }

    public function store() {

    }
}
