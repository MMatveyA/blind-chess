<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [StaticController::class, "home"])->name("home");
Route::get("/about", [StaticController::class, "about"])->name("about");

Route::middleware("guest")
    ->prefix("auth")
    ->name("auth.")
    ->group(function () {
        Route::get("login", [SignController::class, "login"])->name("login");
        Route::get("register", [SignController::class, "register"])->name(
            "register"
        );
    });
