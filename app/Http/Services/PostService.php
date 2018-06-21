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
  private function dataModel($request)
  {
    $dataModel = Post::select(['post.*', 'path.name AS path_name', 'users.name AS user_name'])
      ->join('blog', 'blog.id', 'post.blog_id')
      ->join('path', 'path.id', 'post.path_id')
      ->join('users', 'users.id', 'post.user_id')
      ->whereYear('post.published', $request->year)
      ->whereMonth('post.published', $request->month);
    //Validar request user_id
    if ($request->has('user_id')) {
      $dataModel = $dataModel->where('users.id', $request->user_id);
    }
    //Validar request post_id
    if ($request->has('post_id')) {
      $dataModel = $dataModel->where('post.kind', $request->post_id);
    }
    //Validar request status
    if ($request->has('status')) {
      $dataModel = $dataModel->where('post.status', $request->status);
    } else {
      $dataModel = $dataModel->where('post.status', 'A');
    }
    //Validar request language javascript or php
    if ($request->ajax()) {
      return $dataModel->paginate($request->paginate);
    } else {
      return $dataModel->simplePaginate(2);
    }
  }

  function getPosts($request)
  {
    $yearNow = Carbon::now()->format('Y');
    $monthNow = Carbon::now()->format('m');
    $request->request->add(['year' => $yearNow, 'month' => $monthNow]);
    return $this->dataModel($request);
  }

  function getPostById($year, $month, $post_id, $request)
  {
    $request->request->add(['year' => $year, 'month' => $month, 'post_id' => $post_id]);
    return $this->dataModel($request);
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