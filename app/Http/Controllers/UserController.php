<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    function getUsers(Request $request)
    {
        try{
            $dataTags = (new UserService())->getUsers($request);
            return response()->json($dataTags,OK);
        }catch(Exception $e){
            return response()->json($e->getMessage(),PRECONDITION_FAILED);
        }
    }
}
