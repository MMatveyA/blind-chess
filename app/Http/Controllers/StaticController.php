<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function home()
    {
        return view("web.statics.home");
    }

    public function about()
    {
        return view("web.statics.about");
    }
}
