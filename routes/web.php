<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

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
        Route::post("login", [SignController::class, "login"]);

        Route::get("register", [SignController::class, "register"])->name(
            "register"
        );
        Route::post("register", [SignController::class, "register"]);
    });

Route::middleware("auth")
    ->prefix("auth")
    ->name("auth.")
    ->group(function () {
        Route::get("logout", [SignController::class, "logout"])->name("logout");
    });

Route::resources([
    "post" => PostController::class,
    "users" => UserController::class,
]);

Route::match(["get", "post"], "/uploader", [
    App\Http\Controllers\CKEditorController::class,
    "upload",
])
    ->name("uploader")
    ->middleware("auth");

Route::middleware("auth")
    ->prefix("comment")
    ->name("comment.")
    ->group(function () {
        Route::post("create", [CommentController::class, "create"])->name(
            "create"
        );
    });
