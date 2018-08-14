<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Funcion para obtener todos los posts
    function getPosts(Request $request)
    {
        try{
            $dataPosts = (new PostService())->getAll($request);
            return response()->json($dataPosts, OK);
        }catch(Exception $e){
            return response()->json($e->getMessage(), PRECONDITION_FAILED);
        }
    }

    //Funcion para crear post
    function createPost(PostRequest $request)
    {
        try{
            (new PostService())->create($request);
            return response()->json('created post', CREATED);
        }catch(Exception $e){
            return response()->json($e->getMessage(), PRECONDITION_FAILED);
        }
    }

    //Funcion para actualizar post
    function updatePost($post_id, Request $request)
    {
        try{
            (new PostService())->update($post_id, $request);
            return response()->json('updated post', OK);
        }catch(Exception $e){
            return response()->json($e->getMessage(), PRECONDITION_FAILED);
        }
    }

}