<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredmetController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DomaciController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


    Route::resource('predmet',PredmetController::class);
    Route::resource('student',StudentController::class);
    Route::resource('domaci',DomaciController::class);

    Route::get('/predmet/{id}',[PredmetController::class,'show']);
    Route::get('/student/{id}',[StudentController::class,'show']);
    Route::get('/domaci/{id}',[DomaciController::class,'show']);

    Route::post('/register',[AuthController::class,'register']);