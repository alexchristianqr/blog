<?php

namespace App\Http\Controllers;

use App\Http\Services\BlogService;
use Illuminate\Http\Request;
use Exception;

class BlogController extends Controller
{

  function viewBlog(Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => null, 'status' => false],
    ];
    if ($request->ajax()) {
      return response()->json((new BlogService())->getBlog($request));
    } else {
      $dataBlog = (new BlogService())->getBlog($request);
      return view('pages.blog', compact('dataBreadcrumb', 'dataBlog'));
    }
  }

  function viewBlogSearch()
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $dataSearch = ['route' => route('route.blog.search')];
    return view('layouts.search', compact('dataBreadcrumb', 'dataSearch'));
  }

  function viewBlogCategory()
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Category', 'url' => null, 'status' => false],
    ];
    return view('pages.layouts_blog.blog_categories', compact('dataBreadcrumb'));
  }

  function viewBlogPost()
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Post', 'url' => null, 'status' => false],
    ];
    $dataSearch = ['route' => route('route.blog.post.search', ['param_post' => request('param_post')])];
    return view('pages.post', compact('dataBreadcrumb', 'dataSearch'));
  }

  function viewBlogPostSearch()
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Post', 'url' => route('route.blog.post', ['param_post' => request('param_post')]), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $dataSearch = ['route' => route('route.blog.post.search', ['param_post' => request('param_post')])];
    return view('layouts.search', compact('dataBreadcrumb', 'dataSearch'));
  }

  function getBlog(Request $request)
  {
    try {
      return (new BlogService())->getBlog($request);
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

}