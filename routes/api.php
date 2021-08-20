<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/register",[UserController::class, 'register']);
Route::post("/login",[UserController::class,'login']);
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('users', function(){
        return response(User::all());
    }) ;   
    Route::post('/logout',[UserController::class , 'logout']);
 });
