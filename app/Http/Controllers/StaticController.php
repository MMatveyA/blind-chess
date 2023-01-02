<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticController extends Controller
{
    public function home()
    {
        return view("web.statics.home");
    }

    public function about()
    {
        dd(Auth::user());
        return view("web.statics.about");
    }
}
