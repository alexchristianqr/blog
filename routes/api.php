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

Route::group(['middleware' => ['cors:api', 'verify.access.key']], function($route){
    $route->get('/get-posts', 'PostController@getPosts');
    $route->post('/create-post', 'PostController@createPost');
    $route->put('/update-post/{post_id}', 'PostController@updatePost');
});
