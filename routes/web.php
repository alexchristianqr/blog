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

Route::group(['middleware' => 'web'], function($route){

    //Middleware Guest
    $route->group(['middleware' => 'guest'], function($route){
        //Authentication Routes...
        $route->get('login', 'Auth\LoginController@getLogin')->name('get.login');
        $route->post('login', 'Auth\LoginController@postLogin')->name('post.login');

        //Registration Routes...
        $route->get('register', 'Auth\RegisterController@getRegister')->name('get.register');
        $route->post('register', 'Auth\RegisterController@postRegister')->name('post.register');

        //Password Reset Routes...
        /*$route->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        $route->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        $route->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        $route->post('password/reset', 'Auth\ResetPasswordController@reset');*/

        $route->get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('route.socialite.login');
        $route->get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('route.callback.login');
    });

    //Middleware Auth
    $route->group(['middleware' => 'auth'], function($route){
        //Logout
        $route->get('/logout', 'Auth\LoginController@logout')->name('logout');
    });

    //Blog
    $route->get('/blog', 'BlogController@viewBlog')->name('route.blog');
    $route->get('/blog/search', 'BlogController@viewBlogSearch')->name('route.blog.search');
    $route->get('/get-blog', 'BlogController@getBlog');

    //Blog Category
    $route->get('/blog/category/{category_id}', 'BlogController@viewBlogCategory')->name('route.blog.category');

    //Blog Post
    $route->get('/blog/post/{year}/{month}/{post_id}', 'BlogController@viewBlogPost')->name('route.blog.post');
    $route->get('/blog/post/{year}/{month}/{post_id}/search', 'BlogController@viewBlogPostSearch')->name('route.blog.post.search');

    //Home
    $route->get('/', 'HomeController@viewHome')->name('route.home');

    //Portfolio
    $route->get('/portfolio', 'PortfolioController@viewPortfolio')->name('route.portfolio');
    $route->get('/portfolio/project/{portfolio_kind}', 'PortfolioController@viewPorfolioItem')->name('route.portfolio.item');

    //About
    $route->get('/about', 'AboutController@viewAbout')->name('route.about');

    //Service
    $route->get('/service', 'Controller@viewService')->name('route.service');

    //Contacto
    $route->get('/contact', 'Controller@viewContact')->name('route.contact');
    $route->post('/contact/send-message', 'ContactController@sendMessage')->name('route.contact.sendmessage');

    //Suscripcion
    $route->post('/subscribe', 'SubscriptionController@sendMessage')->name('route.subscription.sendmessage');

    //Policies and Privacy
    $route->get('/policies/terms-conditions', 'Controller@viewPolicies')->name('route.policies.terms');

    //Testear vista laravel blade PHP
    $route->get('/view-1', function(){
       $data = ['fullname'=>'rocio durcal','message'=>'Hola, tengo un proyecto en laravel php que quisiera comentarte y ver si puedes brindarme alguna asesoria personal, espero puedas contactme lo mas antes posible gracias.'];
       return view('templates.contactme.template-contactme',compact('data'));
    });

   $route->get('/view-2', function(){
      $data = ['fullname'=>'rocio durcal','message'=>'Hola, tengo un proyecto en laravel php que quisiera comentarte y ver si puedes brindarme alguna asesoria personal, espero puedas contactme lo mas antes posible gracias.'];
      return view('templates.subscription.template-subscription',compact('data'));
   });



});