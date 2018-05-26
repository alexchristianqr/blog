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
  $route->get('/', function () {
    return view('pages.home');
  })->name('route.home');

  $route->get('/blog', function () {
    return view('pages.blog');
  })->name('route.blog');

  $route->get('/portfolio', function () {
    return view('pages.portfolio');
  })->name('route.portfolio');

  $route->get('/about', function () {
    return view('pages.portfolio');
  })->name('route.about');

  $route->get('/service', function () {
    return view('pages.portfolio');
  })->name('route.service');

  $route->get('/contact', function () {
    return view('pages.portfolio');
  })->name('route.contact');

});

