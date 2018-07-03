<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Post;
use Illuminate\Http\Request;
use Exception;

class PostController extends Controller
{

  function create(Request $request)
  {
    try {
      (new PostService())->create($request);
      if ($request->ajax()) {
        return response()->json('created post', OK);
      } else {
        return 'created post';
      }
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
        return response()->json('updated post', OK);
      } else {
        return 'updated post';
      }
    } catch (Exception $e) {
      if ($request->ajax()) {
        return response()->json($e->getMessage(), PRECONDITION_FAILED);
      } else {
        return abort(PRECONDITION_FAILED);
      }
    }
  }

  function getMonthsPosts()
  {
    try {
      return response()->json((new PostService())->getMonthsPosts(),OK);
    } catch (Exception $e) {
      return response()->json($e->getMessage(),PRECONDITION_FAILED);
    }
  }
}