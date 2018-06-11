<?php

namespace App\Http\Controllers;

use App\Http\Services\BlogService;
use App\Http\Services\CategoryService;
use App\Http\Services\PostService;
use Illuminate\Http\Request;
use Exception;

class BlogController extends Controller
{
  function viewBlog($blog_id, Request $request)
  {
    try {
      $dataBreadcrumb = [
        ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
        ['title' => 'Blog', 'url' => null, 'status' => false],
      ];
      $dataCategory = (new CategoryService())->getCategory($request);
      $dataPost = (new PostService())->getPostByBlogId($blog_id, $request);
      return view('pages.blog', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'blog_id'));
    } catch (Exception $e) {
      echo $e->getMessage();
      return abort(NOT_FOUND);
    }
  }

  function viewBlogSearch($blog_id)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog',[$blog_id]), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $dataSearch = ['route' => route('route.blog.search')];
    return view('layouts.search', compact('dataBreadcrumb', 'dataSearch'));
  }

    function viewBlogCategory($blog_id,Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog',[$blog_id]), 'status' => true],
      ['title' => 'Category', 'url' => null, 'status' => false],
    ];
    return view('pages.categories', compact('dataBreadcrumb','blog_id'));
  }

  function viewBlogPost($blog_id, $post_id, Request $request)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog', [$blog_id]), 'status' => true],
      ['title' => 'Post', 'url' => null, 'status' => false],
    ];
    $dataPost = (new PostService())->getPostById($post_id, $request);
    $dataCategory = (new CategoryService())->getCategory($request);
    $dataSearch = ['route' => route('route.blog.post.search', [$post_id])];
    return view('pages.post', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'dataSearch','blog_id'));
  }

  function viewBlogPostSearch($blog_id,$post_id)
  {
    $dataBreadcrumb = [
      ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
      ['title' => 'Blog', 'url' => route('route.blog',[$blog_id]), 'status' => true],
      ['title' => 'Post', 'url' => route('route.blog.post', ['post_id' => request('post_id')]), 'status' => true],
      ['title' => 'Search', 'url' => null, 'status' => false],
    ];
    $dataSearch = ['route' => route('route.blog.post.search', ['post_id' => request('post_id')])];
    return view('layouts.search', compact('dataBreadcrumb', 'dataSearch'));
  }

  function getBlog(Request $request)
  {
    try {
      return response()->json((new BlogService())->getBlog($request), OK);
    } catch (Exception $e) {
      return response()->json($e->getMessage(), PRECONDITION_FAILED);
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