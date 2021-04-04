<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getusers/', 'gulohan_controller@getUsers');
Route::post('/adduser/', 'gulohan_controller@addUser');
Route::patch('/updateuser/', 'gulohan_controller@updateUser');
