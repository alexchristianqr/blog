<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService
{
	private function dataModel($request)
	{
		//Data Model
		$dataModel = User::select(['users.*']);
		//Rango de Fecha
		if($request->request->has('date_range')){
			$dateExplode = explode('/', $request->request->get('date_range'));
			$dataModel = $dataModel->whereBetween(DB::raw('DATE(users.updated_at)'), [$dateExplode[0], $dateExplode[1]]);
		}
		//User_id
		if($request->has('user_id')) $dataModel = $dataModel->where('users.id', $request->user_id);
		//Paginate
		if($request->has('paginate')) return $dataModel->paginate($request->paginate);
		//First
		if($request->has('first')) return $dataModel->first();
		//Get
		else return $dataModel->get();
	}

	function getUsers($request)
	{
		return $this->dataModel($request);
	}

	function getUserById($request)
	{
		return $this->dataModel($request);
	}

	function create($request)
	{
		return (new User())->fill($request->all())->save();
	}

	function update($request)
	{
		return User::find($request->user_id)->fill($request->all())->save();
	}

}