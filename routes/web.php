<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'web'], function ($route) {

  // Home
  $route->get('/', function () {
    $dataChunk =[
      ['id'=>1],
      ['id'=>2],
      ['id'=>3],
    ];
    return view('pages.home',compact('dataChunk'));
  })->name('route.home');

  // Blog
  $route->get('/blog','BlogController@viewBlog')->name('route.blog');
  $route->get('/blog/search','BlogController@viewBlogSearch')->name('route.blog.search');

  // Blog Category
  $route->get('/blog/category/{param_category}', 'BlogController@viewBlogCategory')->name('route.blog.category');

  // Blog Post
  $route->get('/blog/post/{param_post}', 'BlogController@viewBlogPost')->name('route.blog.post');
  $route->get('/blog/post/{param_post}/search', 'BlogController@viewBlogPostSearch')->name('route.blog.post.search');

  // Portfolio
  $route->get('/portfolio', function () {
    return view('pages.portfolio');
  })->name('route.portfolio');

  // About
  $route->get('/about', function () {
    return view('pages.about');
  })->name('route.about');

  // Service
  $route->get('/service', function () {
    return view('pages.service');
  })->name('route.service');

  // Contact
  $route->get('/contact', function () {
    return view('pages.contact');
  })->name('route.contact');

});

