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

Route::group(['middleware' => 'cors:api'], function ($route) {
  //implement code here
//  Route::group(['middleware' => 'web'], function ($route) {
    // Authentication Routes...
//    $route->post('login', 'Auth\LoginController@login');

    // Registration Routes...
//    $route->post('register', 'Auth\RegisterController@register');
//  });
});
