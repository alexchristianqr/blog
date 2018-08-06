<?php

namespace App\Http\Controllers;

use App\Http\Services\PathService;
use Illuminate\Http\Request;

class PathController extends Controller
{
    function getPaths(Request $request)
    {
        try{
            $dataPaths = (new PathService())->getPaths($request);
            return response()->json($dataPaths,OK);
        }catch(\Exception $e){
            return response()->json($e->getMessage(),PRECONDITION_FAILED);
        }
    }
}
