<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod("GET")) {
            return view("web.auth.login");
        }

        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()
                ->intended("/")
                ->with("status", "Успешная авторизация");
        }

        return back()->withErrors([
            "email" => "Email или пароль не найдены",
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    public function register(Request $request)
    {
        if ($request->isMethod("GET")) {
            return view("web.auth.register");
        }

        $credentials = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        $credentials["password"] = Hash::make($credentials["password"]);

        $user = User::firstOrCreate($credentials);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended("/");
    }
}
