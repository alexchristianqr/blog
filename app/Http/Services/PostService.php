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
    $Post = (new Post())
      ->select(['post.*', 'path.name AS path_name', 'users.name AS user_name'])
      ->join('blog', 'blog.id', 'post.blog_id')
      ->join('path', 'path.id', 'post.path_id')
      ->join('users', 'users.id', 'post.user_id');
    //Validar request user_id
    if ($request->has('user_id')) {
      $Post = $Post->where('users.id', $request->user_id);
    }
    //Validar request blog_id
    if ($request->has('blog_id')) {
      $Post = $Post->where('blog.kind', $request->blog_id);
    }
    //Validar request blog_id
    if ($request->has('post_id')) {
      $Post = $Post->where('post.kind', $request->post_id);
    }
    //Validar request status
    if ($request->has('status')) {
      $Post = $Post->where('post.status', $request->status);
    } else {
      $Post = $Post->where('post.status', 'A');
    }
//    return $Post->get();
    if ($request->ajax()) {
      return $Post->paginate($request->paginate);
    } else {
      return $Post->simplePaginate(2);
    }
  }

  function getPostByBlogId($blog_id, $request)
{
  $request->request->add(['blog_id' => $blog_id]);
  return $this->getPost($request);
}

  function getPostById($post_id, $request)
  {
    $request->request->add(['post_id' => $post_id]);
    return $this->getPost($request);
  }

  function create($request)
  {
    return (new Post())->fill($request->all())->save();
  }

  function update($request)
  {
    return Post::where('id', $request->id)->update($request->all());
  }
}