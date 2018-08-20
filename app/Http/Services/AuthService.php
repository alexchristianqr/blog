<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\User;

class AuthService
{
    function getUserById($request)
    {
        return User::where('id', $request->user_id)->first();
    }

    function verifyRole($request)
    {
        return User::whereExists(function($query) use ($request){
            $query->where('id', $request->user_id);
        })->first(['role_id'])->role_id;
    }

    /**
     * @param $request
     * @return bool: True (1) or False (0)
     */
    function getStatusSession($request)
    {
        return (bool)User::whereExists(
            function($query) use ($request){
                $query->where('id', $request->user_id);
                $query->where('remember_token', null);
            })->first();
    }

    /**
     * @param $request
     * @return mixed: Activo (A) o Inactivo (I)
     */
    function getStatusUser($request)
    {
        return User::where('id', $request->user_id)->first(['status'])->status;
    }
}