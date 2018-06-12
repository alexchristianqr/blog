<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 04/06/2018
 * Time: 08:37 PM
 */

namespace App\Http\Services;


use App\Post;
use Carbon\Carbon;

class PostService
{
  function getPost($request)
  {
    $Post = Post::select(['post.*', 'path.name AS path_name', 'users.name AS user_name'])
      ->join('blog', 'blog.id', 'post.blog_id')
      ->join('path', 'path.id', 'post.path_id')
      ->join('users', 'users.id', 'post.user_id')
      ->whereYear('post.published', $request->year)
      ->whereMonth('post.published', $request->month);
    //Validar request user_id
    if ($request->has('user_id')) {
      $Post = $Post->where('users.id', $request->user_id);
    }
    //Validar request post_id
    if ($request->has('post_id')) {
      $Post = $Post->where('post.kind', $request->post_id);
    }
    //Validar request status
    if ($request->has('status')) {
      $Post = $Post->where('post.status', $request->status);
    } else {
      $Post = $Post->where('post.status', 'A');
    }
    if ($request->ajax()) {
      return $Post->paginate($request->paginate);
    } else {
      return $Post->simplePaginate(2);
    }
  }

  function getPosts($request)
  {
    $yearNow = Carbon::now()->format('Y');
    $monthNow = Carbon::now()->format('m');
    $request->request->add(['year' => $yearNow, 'month' => $monthNow]);
    return $this->getPost($request);
  }

  function getPostById($year, $month, $post_id, $request)
  {
    $request->request->add(['year' => $year, 'month' => $month, 'post_id' => $post_id]);
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