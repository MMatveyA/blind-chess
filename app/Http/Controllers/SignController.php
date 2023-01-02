<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignController extends Controller
{
    public function login()
    {
        return view("web.auth.login");
    }

    public function register()
    {
        return view("web.auth.register");
    }
}
