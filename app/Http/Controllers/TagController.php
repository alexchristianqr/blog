<?php

namespace App\Http\Controllers;

use App\Http\Services\TagService;
use Illuminate\Http\Request;
use Exception;

class TagController extends Controller
{
    function getTags(Request $request)
    {
        try{
            $dataTags = (new TagService())->getTags($request);
            return response()->json($dataTags,OK);
        }catch(Exception $e){
            return response()->json($e->getMessage(),PRECONDITION_FAILED);
        }
    }
}
