<?php

use Illuminate\Http\Request;
use App\Http\Middleware\Guest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware(Authenticate::class)->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
   
});
