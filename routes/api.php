<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AuthController;



Route::get("/film/join", [FilmController::class, "join"]);
Route::get("/film/leftjoin", [FilmController::class, "leftjoin"]);
Route::get("/film/rightjoin", [FilmController::class, "rightjoin"]);
Route::get("/film/count", [FilmController::class, "count"]);

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::get("/me", [AuthController::class, "me"])->middleware('auth:sanctum');
