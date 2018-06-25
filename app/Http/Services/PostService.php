<?php
/**
 * Created by PhpStorm.
 * Email: aquispe.developer@gmail.com
 */

namespace App\Http\Services;


use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
    //Validate exist request param user_id
    if ($request->has('user_id')) {
      $dataModel = $dataModel->where('users.id', $request->user_id);
    }
    //Validate exist request param post_id
    if ($request->has('post_id')) {
      $dataModel = $dataModel->where('post.kind', $request->post_id);
    }
    //Validate exist request param status
    if ($request->has('status')) {
      $dataModel = $dataModel->where('post.status', $request->status);
    } else {
      $dataModel = $dataModel->where('post.status', 'A');
    }
    //Validate is request by javascript or php
    if ($request->has('isPaginate')) {
      if ($request->ajax()) {
        return $dataModel->paginate($request->paginate);
      } else {
        return $dataModel->simplePaginate(2);
      }
    } else {
      if ($request->has('isFirst')) {
        return $dataModel->first();
      } else {
        return $dataModel->get();
      }
    }
  }

  function getPosts($request)
  {
//    dd($this->getMonthsPosts());
    $yearNow = Carbon::now()->format('Y');
    $monthNow = Carbon::now()->format('m');
    $request->request->add(['isPaginate' => true, 'year' => $yearNow, 'month' => $monthNow]);
    return $this->dataModel($request);
  }

  function getPostById($year, $month, $post_id, $request)
  {
    $request->request->add(['isFirst' => true, 'year' => $year, 'month' => $month, 'post_id' => $post_id]);
    return $this->dataModel($request);
  }

  function create($request)
  {
    return (new Post())->fill($request->all())->save();
  }

  function update($request)
  {
    return Post::where('post.id', $request->post_id)->update($request->all());
  }

  function getMonthsPosts()
  {
//    dd($this->getLinksByMonths());
    return Post::distinct()->select(DB::raw('MONTH(post.published) AS published_month'))->orderBy('post.published','ASC')->get()->toArray();
  }

  function getLinksByMonths()
  {
    return Post::select([DB::raw('MONTH(post.published) AS published_month'),'post.kind'])->orderBy('post.published','ASC')->get()->toArray();
  }
}