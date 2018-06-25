<?php
/**
 * Created by PhpStorm.
 * Email: aquispe.developer@gmail.com
 */

namespace App\Http\Services;


use App\User;

class UserService
{
  private function dataModel($request)
  {
    $dataModel = User::select();
    //Validate exist request param user_id
    if ($request->has('user_id')) {
      $dataModel = $dataModel->where('users.id', $request->user_id);
    }
    $dataModel = $dataModel->get();
    return $dataModel;
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
    return User::where('users.id', $request->user_id)->update($request->all());
  }
}