<?php
/**
 * Created by PhpStorm.
 * Email: aquispe.developer@gmail.com
 */

namespace App\Http\Services;

use App\Http\Controllers\Utility;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostService
{
  use Utility;

  private function dataModel($request)
  {
    $dataModel = Post::select(['post.*', 'path.name AS path_name', 'users.name AS user_name'])
      ->join('blog', 'blog.id', 'post.blog_id')
      ->join('path', 'path.id', 'post.path_id')
      ->join('users', 'users.id', 'post.user_id');
    //Validate exist request param year
    if ($request->has('year')) {
      $dataModel = $dataModel->whereYear('post.published', $request->year);
    }
    //Validate exist request param month
    if ($request->has('month')) {
      $dataModel = $dataModel->whereMonth('post.published', $request->month);
    }
    //Validate exist request param search
    if ($request->has('param_search')) {
      if (strpos($request->param_search, ' ') == true) {
        $simbol = ' ';
      } else if (strpos($request->param_search, '+') == true) {
        $simbol = '+';
      } else {
        $simbol = ' ';
      }
      $research_text = explode($simbol, $request->param_search);
      if (count($research_text) > 1) {
        $dataModel = $dataModel->where(function ($query) use ($research_text) {

          //Filtrar por el campo name del post
          $query = $query->where('post.name', 'like', '%' . $research_text[0] . '%');
          foreach ($research_text as $k => $v) {
            if (isset($research_text[$k + 1])) {
              $query = $query->orWhere('post.name', 'like', '%' . $research_text[$k + 1] . '%');
            }
          }
          //Filtrar por el campo descripcion del post
          $query = $query->orWhere('post.description', 'like', '%' . $research_text[0] . '%');
          foreach ($research_text as $k => $v) {
            if (isset($research_text[$k + 1])) {
              $query = $query->orWhere('post.description', 'like', '%' . $research_text[$k + 1] . '%');
            }
          }
          //Filtrar por el campo name del usuario
          $query = $query->orWhere('users.name', 'like', '%' . $research_text[0] . '%');
          foreach ($research_text as $k => $v) {
            if (isset($research_text[$k + 1])) {
              $query = $query->orWhere('users.name', 'like', '%' . $research_text[$k + 1] . '%');
            }
          }

        });
      } else {
        $dataModel = $dataModel->where(function ($query) use ($request) {
          $query->where('post.name', 'like', '%' . $request->param_search . '%');
          $query->orWhere('users.name', 'like', '%' . $request->param_search . '%');
        });
      }
    }
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
        if ($request->has('simplePaginate')) {
          return $dataModel->simplePaginate($request->paginate);
        } else {
          return $dataModel->paginate($request->paginate);
        }
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
    $yearNow = Carbon::now()->format('Y');
    $monthNow = Carbon::now()->addMonth(-6)->format('m');
    $request->request->add(['isPaginate' => true, 'simplePaginate'=>true,'paginate' => isset($request->paginate)?$request->paginate:6,'year' => $yearNow, 'month' => $monthNow]);
    return $this->dataModel($request);
  }

  function getPortafolios($request)
  {
    $yearNow = Carbon::now()->format('Y');
    $monthNow = Carbon::now()->addMonth(-6)->format('m');
    $request->request->add(['isPaginate' => true, 'paginate' => 6, 'year' => $yearNow, 'month' => $monthNow]);
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

  function getHistory()
  {
    $newDataPostHistory = [];
    $arrayMonths = [];
    $arrayUrls = [];
    $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    $years = $this->generateYearsRange('2000-01-01', Carbon::now());
    $dataPostHistory = Post::select([DB::raw('YEAR(post.published) AS year, MONTH(post.published) AS month'), 'post.kind', 'post.name'])
      ->orderBy('post.published', 'ASC')
      ->get();
    $currentYear = 0;
    $currentMonth = 0;

    //Ciclo Year
    foreach ($dataPostHistory as $item) {
      if ($item->year != $currentYear) {
        $currentYear = 0;//Reinicializar la variable del año
        $arrayMonths = [];//Reinicializar el arreglo de meses que se encuentra en el año
      }
      for ($k = 0; $k < count($years); $k++) {
        if ($item->year == $years[$k]) {
          $currentYear = $item->year;

          if ($item->month != $currentMonth) {
            $currentMonth = 0;//Reinicializar la variable del mes
          }

          for ($i = 0; $i < count($months); $i++) {
            if ($item->month == $months[$i]) {
              $arrayUrlsTemp = $arrayUrls;//Cargar arreglo de links-temporales del arreglo de links
              $arrayUrls = [];//Reinicializar el arreglo de links qu se encuentra en el mes

              if ($currentMonth == $months[$i]) {
                array_push($arrayUrlsTemp, (object)['kind' => $item->kind, 'name' => $item->name]);
                $arrayUrls = $arrayUrlsTemp;//Cargar arreglo de links del arreglo de links-temporales
              } else {
                $currentMonth = $item->month;
                array_push($arrayUrls, (object)['kind' => $item->kind, 'name' => $item->name]);
              }
              $arrayMonths[$months[$i]] = $arrayUrls;//Almacenar links en el mes del ciclo

            } else {
              continue;
            }
          }

        } else {
          continue;
        }
      }
      $newDataPostHistory[$item->year] = $arrayMonths;
    }
    return $newDataPostHistory;
  }

  function getSearch($request)
  {
    $request->request->add(['isPaginate' => true, 'paginate' => 6]);
    return $this->dataModel($request);
  }
}