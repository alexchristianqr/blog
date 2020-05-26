<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\Http\Controllers\Utility;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostService
{
	use Utility;

	private $paginateGlobal = 4;

	private function dataModel($request)
	{
		//Data Model
		if($request->has('fields')){
			$dataModel = Post::select($request->fields);
		}else{
			$dataModel = Post::select('post.*', 'path.name AS path_name', 'users.name AS user_name');
		}
		$dataModel = $dataModel->join('path', 'path.id', 'post.path_id')->join('users', 'users.id', 'post.user_id');

		//Year
		if($request->request->has('year')) $dataModel = $dataModel->whereYear('post.published', $request->year);
		//Month
		if($request->request->has('month')) $dataModel = $dataModel->whereMonth('post.published', $request->month);
		//Search
		if($request->has('param_search')){
			if(strpos($request->param_search, ' ') == true){
				$simbol = ' ';
			}else if(strpos($request->param_search, '+') == true){
				$simbol = '+';
			}else{
				$simbol = ' ';
			}
			$research_text = explode($simbol, $request->param_search);
			if(count($research_text) > 1){
				$dataModel = $dataModel->where(function($query) use ($research_text){
					//Filtrar por el campo name del post
					$query = $query->where('post.name', 'like', '%' . $research_text[0] . '%');
					foreach($research_text as $k => $v){
						if(isset($research_text[$k + 1])){
							$query = $query->orWhere('post.name', 'like', '%' . $research_text[$k + 1] . '%');
						}
					}
					//Filtrar por el campo descripcion del post
					$query = $query->orWhere('post.description', 'like', '%' . $research_text[0] . '%');
					foreach($research_text as $k => $v){
						if(isset($research_text[$k + 1])){
							$query = $query->orWhere('post.description', 'like', '%' . $research_text[$k + 1] . '%');
						}
					}
					//Filtrar por el campo name del usuario
					$query = $query->orWhere('users.name', 'like', '%' . $research_text[0] . '%');
					foreach($research_text as $k => $v){
						if(isset($research_text[$k + 1])){
							$query = $query->orWhere('users.name', 'like', '%' . $research_text[$k + 1] . '%');
						}
					}
				});
			}else{
				$dataModel = $dataModel->where(function($query) use ($request){
					$query->where('post.name', 'like', '%' . $request->param_search . '%');
					$query->orWhere('users.name', 'like', '%' . $request->param_search . '%');
				});
			}
		}

		//User_id
		if($request->has('user_id')) $dataModel = $dataModel->where('users.id', $request->user_id);

		//Post_id
		if($request->has('post_id')) $dataModel = $dataModel->where('post.kind', $request->post_id);

		//Status
      if($request->has('status')){
         if($request->get('status') != '') $dataModel = $dataModel->where('post.status', $request->get('status'));
      }

		//OrderField
      if($request->has('orderBy')){
         if($request->get('orderBy') == "blog") $dataModel = $dataModel->orderBy('id', 'DESC')->orderBy(($request->has('orderField')) ? $request->orderField : 'post.published', 'DESC');
         if($request->get('orderBy') == "cms") $dataModel = $dataModel->orderBy('post.id', 'DESC');
      }

		//Debug Customize
		//$this->myDebug($dataModel,true);

		//Paginate
		if($request->has('paginate')){
			if($request->ajax()){//Javascript
				return $dataModel->paginate($request->paginate);
			}else{//Php
				if($request->has('simplePaginate')){//Si es un paginado simple
					return $dataModel->simplePaginate($request->paginate);
				}else{//Si es un paginado enumerado
					return $dataModel->paginate($request->paginate);
				}
			}
		}
		//First
		if($request->has('first')) return $dataModel->first();
		//Get
		else return $dataModel->get();
	}

	function getPosts($request)
	{
		$request->request->add([
			'paginate' => $this->paginateGlobal,
			'status' => 'A',
			'simplePaginate' => true,
			'orderBy' => "blog",
		]);
		return $this->dataModel($request);
	}

	function getAll($request)
	{
		$request->request->add(['orderBy' => "cms"]);
		return $this->dataModel($request);
	}

	function getPostById($year, $month, $post_id, $request)
	{
		$request->request->add([
			'first' => true,
			'year' => $year,
			'month' => $month,
			'post_id' => $post_id,
			'status' => 'A',
		]);
		return $this->dataModel($request);
	}

	function create($request)
	{
		return (new Post())->fill($request->all())->save();
	}

	function update($id, $request)
	{
      $dataModel = Post::find($id);
      if($request->hasFile('file_image')){
         //Eliminar imagen anterior
         if($dataModel->image != "post.default.jpg"){
            $path = public_path() . '/img/avatars/' . $dataModel->image;
            if(file_exists($path)) unlink($path);
         }
         //Crear nueva imagen
         $file_image = $request->file('file_image');
         $destinationPath = public_path('images/post');
         $date_and_time = date('Ymd') . "_" . date('His');
         $extension = $file_image->getClientOriginalExtension();
         $filename_image =  "$date_and_time.$extension";
         $file_image->move($destinationPath, $filename_image);
         //Set nueva imagen
         $dataModel->image = $filename_image;
      }
		$dataModel->fill($request->all());
      $dataModel->path = 'images/post/';
      $dataModel->save();


	}

	function getHistory()
	{
		$newDataPostHistory = [];
		$arrayMonths = [];
		$arrayUrls = [];
		$months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
		$years = $this->generateYearsRange('2000-01-01', Carbon::now());
		$dataPostHistory = Post::select(DB::raw('YEAR(post.published) AS year, MONTH(post.published) AS month'), 'post.kind', 'post.name')
			->where('post.status', 'A')
			->orderBy('post.published', 'DESC')
			->get();
		$currentYear = 0;
		$currentMonth = 0;
		//Ciclo Year
//		dd($dataPostHistory->toArray());
		foreach($dataPostHistory as $item){
			//Al cambiar de año
			if($item->year != $currentYear){
				$currentYear = 0;//Reinicializar la variable del año
				$arrayMonths = [];//Reinicializar el arreglo de meses que se encuentra en el año
				$arrayUrls = [];//Reinicializar las url de ese año
			}
			for($k = 0; $k < count($years); $k++){
				if($item->year == $years[$k]){
					$currentYear = $item->year;
					//Al cambiar de mes
					if($item->month != $currentMonth){
						$currentMonth = 0;//Reinicializar la variable del mes
						$arrayUrls = [];//Reinicializar las url de ese mes
					}
					for($i = 0; $i < count($months); $i++){
						if($item->month == $months[$i]){
							$currentMonth = $item->month;
							$arrayUrlsTemp = $arrayUrls;//Cargar arreglo de links-temporales del arreglo de links
							$arrayUrls = [];//Reinicializar el arreglo de links qu se encuentra en el mes
							if($currentMonth == $months[$i]){
								array_push($arrayUrlsTemp, (object)['kind' => $item->kind, 'name' => $item->name]);
								$arrayUrls = $arrayUrlsTemp;//Cargar arreglo de links del arreglo de links-temporales
							}else{
								$currentMonth = $item->month;
								array_push($arrayUrls, (object)['kind' => $item->kind, 'name' => $item->name]);
							}
							$arrayMonths[$months[$i]] = $arrayUrls;//Almacenar links en el mes del ciclo
						}else{
							continue;
						}
					}
				}else{
					continue;
				}
			}
			$newDataPostHistory[$item->year] = $arrayMonths;
			ksort($newDataPostHistory[$item->year]);
		}
		return $newDataPostHistory;
	}

	function getSearch($request)
	{
		$request->request->add(['paginate' => $this->paginateGlobal, 'status' => 'A','orderBy' => true,]);
		return $this->dataModel($request);
	}

	function getLatestPosts($request)
	{
		$request->request->add(['fields' => ['image', 'path.name AS path_name', 'post.name'], 'status' => 'A']);
		return $this->dataModel($request);
	}
}