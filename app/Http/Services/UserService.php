<?php
/**
 * Created by PhpStorm.
 * Email: aquispe.developer@gmail.com
 */

namespace App\Http\Services;

use App\User;

class UserService
{
    private function dataModel($request, $columns = ['users.*'], $limit = false)
    {
        $dataModel = User::select($columns);
        //Validate exist request param user_id
        if($request->has('user_id')){
            $dataModel = $dataModel->where('users.id', $request->user_id);
        }
        if($limit){
            $dataModel = $dataModel->first();
        }else{
            $dataModel = $dataModel->get();
        }
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

    function searchUser($request)
    {
        $request->request->add([
            'role_join' => true,
            'project_join' => true,
            'status' => 'A',
        ]);
        $User = $this->dataModel($request, [
            'users.id',
            'users.role_id AS role',
            'users.project_id AS project',
            'users.name',
            'users.username',
            'users.email',
            'users.status',
            'role.name AS role_name',
            'role.status AS role_status',
            'project.name AS project_name',
            'project.status AS project_status'
        ], true);
        $User->role = ['id' => $User->role, 'name' => $User->role_name, 'status' => $User->role_status];
        $User->project = ['id' => $User->project, 'name' => $User->project_name, 'status' => $User->project_status];
        return $User;
    }
}