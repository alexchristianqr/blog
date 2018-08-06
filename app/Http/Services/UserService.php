<?php
/**
 * Created by PhpStorm.
 * Email: aquispe.developer@gmail.com
 */

namespace App\Http\Services;

use App\User;
use Exception;

class UserService
{
    private function dataModel($request)
    {
        //Model
        $dataModel = User::select(['users.*']);
        //Filtrar por "user_id"
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