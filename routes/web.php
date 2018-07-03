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
    return view('pages.home');
  })->name('route.home');

  // Blog
  $route->get('/blog','BlogController@viewBlog')->name('route.blog');
  $route->get('/blog/search','BlogController@viewBlogSearch')->name('route.blog.search');
  $route->get('/get-blog','BlogController@getBlog');

  // Blog Category
  $route->get('/blog/category/{category_id}', 'BlogController@viewBlogCategory')->name('route.blog.category');

  // Blog Post
  $route->get('/blog/post/{year}/{month}/{post_id}', 'BlogController@viewBlogPost')->name('route.blog.post');
  $route->get('/blog/post/{year}/{month}/{post_id}/search', 'BlogController@viewBlogPostSearch')->name('route.blog.post.search');

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