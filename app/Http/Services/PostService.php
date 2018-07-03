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
//    return $this->getHistory();
    $yearNow = Carbon::now()->format('Y');
    $monthNow = Carbon::now()->addMonth(-6)->format('m');
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
    return Post::distinct()->select(DB::raw('MONTH(post.published) AS published_month'))->orderBy('post.published', 'ASC')->get()->toArray();
  }

  function getLinksByMonths()
  {
    return Post::select([DB::raw('MONTH(post.published) AS published_month'), 'post.kind'])->orderBy('post.published', 'ASC')->get()->toArray();
  }

  function getHistory()
  {
    $newDataPostHistory = [];
    $arrayMonths = [];
    $months  = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    $dataPostHistory = Post::select(DB::raw('YEAR(post.published) AS post_year, MONTH(post.published) AS post_month'), 'post.kind')
      ->groupBy('post_month')
      ->orderBy('post.published', 'ASC')
      ->get()->toArray();
    dd($dataPostHistory);
    $currentYear = 0;
    $currentMonth = 0;
    $dataMonths = ['Enero', 'Febrero', 'Marzo', 'Marzo'];

    foreach ($dataPostHistory as $item) {
      if ($currentYear == 0) {
        $currentYear = $item->year;
        $arrayMonths = [];
      }

      //Ciclo Year
      if ($item->year == $currentYear) {
        if($currentMonth == 0) {
          $currentMonth = $item->month;
        }
        for ($i = 0; $i < count($months); $i++) {
//          if($currentMonth == $months[$i]) {
            $currentMonth = $months[$i];
            array_push($arrayMonths ,$currentMonth);
//            }
        }
        if($item->month != $currentMonth){
          $currentMonth = 0;
        }
      }
      $newDataPostHistory[$item->year] = $arrayMonths;
    }
    dd($newDataPostHistory);
    return $dataPostHistory;
  }
}