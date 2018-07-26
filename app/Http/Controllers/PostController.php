<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Post;
use Illuminate\Http\Request;
use Exception;

class PostController extends Controller
{

    function getPosts(Request $request)
    {
        try{
            $dataPosts = (new PostService())->allPosts($request);
            return response()->json($dataPosts, 200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 412);
        }
    }

    function createPost(PostRequest $request)
    {
        try{
            (new PostService())->create($request);
            if($request->ajax()){
                return response()->json('created post', CREATED);
            }else{
                return 'created post';
            }
        }catch(Exception $e){
            if($request->ajax()){
                return response()->json($e->getMessage());
            }else{
                return abort(PRECONDITION_FAILED);
            }
        }
    }

    function updatePost($post_id, Request $request)
    {
        try{
            (new PostService())->update($post_id, $request);
            if($request->ajax()){
                return response()->json('updated post', OK);
            }else{
                return 'updated post';
            }
        }catch(Exception $e){
            if($request->ajax()){
                return response()->json($e->getMessage(), PRECONDITION_FAILED);
            }else{
                return abort(PRECONDITION_FAILED);
            }
        }
    }

    function getMonthsPosts()
    {
        try{
            return response()->json((new PostService())->getMonthsPosts(), OK);
        }catch(Exception $e){
            return response()->json($e->getMessage(), PRECONDITION_FAILED);
        }
    }

}