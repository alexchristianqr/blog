<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 04/06/2018
 * Time: 08:37 PM
 */

namespace App\Http\Services;


use App\Post;

class PostService
{

  function getPost($request)
  {
    if ($request->ajax()) {
      return Post::where('status', 'A')->get();
    } else {
      return Post::where('status', 'A')->get();
    }
  }

  function create($request)
  {
    return Post::create($request->all());
  }

  function update($request)
  {
    return Post::where('id', $request->id)->update($request->all());
  }

}