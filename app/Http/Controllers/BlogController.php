<?php

namespace App\Http\Controllers;

use App\Http\Services\BlogService;
use App\Http\Services\CategoryService;
use App\Http\Services\PostService;
use Illuminate\Http\Request;
use Exception;

class BlogController extends Controller
{
  function viewBlog(Request $request)
  {
//    $this->util_create('Aldo Mariategui');
//    $this->util_select();
//    $this->util_edit('Deysi',5);
//    $this->util_select();
//    $this->util_delete(5-1);
//    $this->util_select();
    try {
      $dataBreadcrumb = [
        ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
        ['title' => 'Blog', 'url' => null, 'status' => false],
      ];
      $dataCategory = (new CategoryService())->getCategory($request);
      $dataPost = (new PostService())->getPosts($request);
      $dataMonthsPosts = (new PostService())->getMonthsPosts();
      $dataLinksMonths = (new PostService())->getLinksByMonths();
      $dataHistory= (new PostService())->getHistory();
//      dd($dataHistory);
      return view('pages.blog', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'dataMonthsPosts', 'dataLinksMonths','dataHistory'));
    } catch (Exception $e) {
      return abort(NOT_FOUND);
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
    $dataSearch = ['route' => route('route.blog.post.search', [$year, $month, $post_id])];
    return view('pages.post', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'dataSearch'));
  }

  function viewBlogPostSearch($year, $month, $post_id)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Post', 'url' => route('route.blog.post', [$year, $month, $post_id]), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $dataSearch = ['route' => route('route.blog.post.search', [$year, $month, $post_id])];
    return view('layouts.search', compact('dataBreadcrumb', 'dataSearch'));
  }

  function getBlog(Request $request)
  {
    try {
      if($request->ajax()){
        return response()->json((new PostService())->getPosts($request),OK);
      }else{
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