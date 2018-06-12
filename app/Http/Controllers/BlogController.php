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
    try {
      $dataBreadcrumb = [
        ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
        ['title' => 'Blog', 'url' => null, 'status' => false],
      ];
      $dataCategory = (new CategoryService())->getCategory($request);
      $dataPost = (new PostService())->getPosts($request);
      return view('pages.blog', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'blog_id'));
    } catch (Exception $e) {
      echo $e->getMessage();
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

  function viewBlogCategory(Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Category', 'url' => null, 'status' => false],
    ];
    return view('pages.categories', compact('dataBreadcrumb'));
  }

  function viewBlogPost($year,$month,$post_id, Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Post', 'url' => null, 'status' => false],
    ];
    $dataPost = (new PostService())->getPostById($year,$month,$post_id, $request);
    $dataCategory = (new CategoryService())->getCategory($request);
    $dataSearch = ['route' => route('route.blog.post.search', [$post_id])];
    return view('pages.post', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'dataSearch'));
  }

  function viewBlogPostSearch($post_id)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
      ['title' => 'Post', 'url' => route('route.blog.post', ['post_id' => request('post_id')]), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $dataSearch = ['route' => route('route.blog.post.search', ['post_id' => request('post_id')])];
    return view('layouts.search', compact('dataBreadcrumb', 'dataSearch'));
  }

  function getBlog(Request $request)
  {
    try {
      return (new PostService())->getPosts($request);
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