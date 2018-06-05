<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 04/06/2018
 * Time: 08:37 PM
 */

namespace App\Http\Services;


use App\Blog;

class BlogService
{
  function getBlog($request)
  {
    if ($request->ajax()) {
      return Blog::where('status','A')->paginate($request->paginate);
    } else {
      return Blog::where('status','A')->simplePaginate(3);
    }
  }
}