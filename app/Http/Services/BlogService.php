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
    $Blog = (new Blog())->select(['blog.*', 'path.name AS path_name','users.name AS user_name'])
      ->join('path', 'path.id', 'blog.path_id')
      ->join('users', 'users.id', 'blog.user_id');
    if ($request->has('status')) {
      $Blog = $Blog->where('blog.status', $request->status);
    } else {
      $Blog = $Blog->where('blog.status', 'A');
    }
    if ($request->ajax()) {
      return $Blog->paginate($request->paginate);
    } else {
      return $Blog->simplePaginate(2);
    }
  }

  function create($request)
  {
    return (new Blog())->fill($request->all())->save();
  }

  function update($request)
  {
    return Blog::where('id', $request->id)->update($request->all());
  }
}