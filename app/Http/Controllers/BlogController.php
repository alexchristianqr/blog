<?php

namespace App\Http\Controllers;

use App\Http\Services\BlogService;
use App\Http\Services\CategoryService;
use App\Http\Services\PostService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Exception;

class BlogController extends Controller
{
  function viewBlog(Request $request)
  {
    try {
      $dataBreadcrumb = [
        ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
        ['title' => 'Blog', 'url' => null, 'status' => false],
      ];
      $dataCategory = (new CategoryService())->getCategory($request);
      $dataPost = (new PostService())->getPosts($request);
      $dataHistory = (new PostService())->getHistory();
      $dataMonths = $this->getMonths();
      $routeSearch = route('route.blog.search');
      return view('pages.blog', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'dataHistory', 'dataMonths', 'routeSearch'));
    } catch (Exception $e) {
      return abort(NOT_FOUND);
    }
  }

  function viewBlogCategory()
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Category', 'url' => null, 'status' => false],
    ];
    return view('pages.categories', compact('dataBreadcrumb'));
  }

  function viewBlogPost($year, $month, $post_id, Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Post', 'url' => null, 'status' => false],
    ];
    $dataPost = (new PostService())->getPostById($year, $month, $post_id, $request);
    $dataCategory = (new CategoryService())->getCategory($request);
    $routeSearch = route('route.blog.post.search', [$year, $month, $post_id]);
    $dataMonths = $this->getMonths();
    $dataHistory = (new PostService())->getHistory();
    return view('pages.post', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'routeSearch', 'dataMonths', 'dataHistory'));
  }

  function viewBlogSearch(Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $routeSearch = route('route.blog.search');
    $dataSearch = (new PostService())->getSearch($request);
    return view('pages.search', compact('dataBreadcrumb', 'routeSearch', 'dataSearch'));
  }

  function viewBlogPostSearch($year, $month, $post_id, Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Post', 'url' => route('route.blog.post', [$year, $month, $post_id]), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $routeSearch = route('route.blog.post.search', [$year, $month, $post_id]);
    $dataSearch = (new PostService())->getSearch($request);
    return view('pages.search', compact('dataBreadcrumb', 'routeSearch', 'dataSearch'));
  }

  function getBlog(Request $request)
  {
    try {
      if ($request->ajax()) {
        return response()->json((new PostService())->getPosts($request), OK);
      } else {
        return (new PostService())->getPosts($request);
      }
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  function create(Request $request)
  {
    try {
      return response()->json((new BlogService())->create($request), CREATED);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), PRECONDITION_FAILED);
    }
  }

  function update(Request $request)
  {
    try {
      return response()->json((new BlogService())->update($request), OK);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), NOT_MODIFIED);
    }
  }
}