<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::post('/todo',[TodoController::class,'Store']);
Route::get('/todos',[TodoController::class,'Index']);
Route::get('/todo/{id}',[TodoController::class,'Show']);
Route::delete('/todo/{id}/delete',[TodoController::class,'Destroy']);
Route::put('/todo/{id}/update',[TodoController::class,'Patch']);