<?php

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

Route::group(['middleware' => 'cors:api'], function($route){
    //Auth Login
    $route->post('auth/login', 'Auth\Api\AuthController@login');

    //Auth Logout
    $route->post('auth/logout', 'Auth\Api\AuthController@logout');

    //Auth Jwt
    $route->group(['middleware' => ['verify.authorization', 'jwt.auth']], function($route){
        //Post
        $route->get('get-posts', 'PostController@getPosts');
        $route->post('create-post', 'PostController@createPost');
        $route->put('update-post/{post_id}', 'PostController@updatePost');

        //Tag
        $route->get('get-tags', 'TagController@getTags');

        //Path
        $route->get('get-paths', 'PathController@getPaths');

        //User
        $route->get('get-users', 'UserController@getUsers');
    });
});