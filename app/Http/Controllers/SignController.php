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
        $remember_token = $request->validate([
            "remember_token" => ["required"],
        ]);
        if (Auth::attempt($credentials, $remember_token)) {
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
            "email" => ["required", "email", "unique:users,email"],
            "password" => ["required"],
        ]);
        $remember_token = $request->validate([
            "remember_token" => ["required"],
        ]);

        $credentials["password"] = Hash::make($credentials["password"]);
        $credentials["superuser"] = false;

        $user = User::firstOrCreate($credentials);
        $user->save();

        login($request);
    }
}
