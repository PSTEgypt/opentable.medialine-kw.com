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


Route::post('/register','Api\UsersControllers@register');
Route::post('/login','Api\UsersControllers@login');
Route::post('/forgetPassword','Api\UsersControllers@forgetPassword');
Route::post('/verifyCode','Api\UsersControllers@validateCode');
Route::post('/resetPassword','Api\UsersControllers@changePassword');
Route::post('/updateProfile','Api\UsersControllers@updateProfile');
Route::post('/fmcNotification','Api\UsersControllers@fmcNotification');


Route::post('/home','Api\RestaurantControllers@home');
Route::post('/category','Api\RestaurantControllers@category');


Auth::routes();
