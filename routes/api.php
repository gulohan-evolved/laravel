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
Route::post('/registeruser/','gulohan_controller@registerUser');
Route::post('/signinuser/', 'gulohan_controller@signinUser');
Route::post('/logoutuser/', 'gulohan_controller@logoutUser');

Route::get('/getproduct/','product_controller@getProduct');
Route::post('/addproduct/','product_controller@addProduct');
Route::delete('/deleteproduct/','product_controller@deleteProduct');
