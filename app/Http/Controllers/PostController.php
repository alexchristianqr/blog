<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use Illuminate\Http\Request;
use Exception;

class PostController extends Controller
{
  function getPost(Request $request)
  {
    try {
      return (new PostService())->getPost($request);
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  function create(Request $request)
  {
    try {
      return (new PostService())->create($request);
    } catch (Exception $e) {
      if ($request->ajax()) {
        return response()->json($e->getMessage());
      } else {
        return abort(412);
      }
    }
  }

  function update(Request $request)
  {
    try {
      (new PostService())->update($request);
      if ($request->ajax()) {
        return response()->json('updated post', 200);
      } else {
        return 'updated post';
      }
    } catch (Exception $e) {
      if ($request->ajax()) {
        return response()->json($e->getMessage(), 412);
      } else {
        return abort(412);
      }
    }
  }
}