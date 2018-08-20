<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\PostService;
use App\Http\Services\ShareService;
use App\Http\Services\TagService;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function viewBlog(Request $request)
    {
        try{
            $dataBreadcrumb = [
                ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
                ['title' => 'Blog', 'url' => null, 'status' => false],
            ];
            $dataCategory = (new CategoryService())->getCategory($request);
            $dataPost = (new PostService())->getPosts($request);
            $dataHistory = (new PostService())->getHistory();
            $dataMonths = $this->getMonths();
            $routeSearch = route('route.blog.search');
            return view('pages.blog', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'dataHistory', 'dataMonths', 'routeSearch'));
        }catch(Exception $e){
            return abort(NOT_FOUND);
        }
    }

    function viewBlogCategory()
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
            ['title' => 'Category', 'url' => null, 'status' => false],
        ];
        return view('pages.categories', compact('dataBreadcrumb'));
    }

    function viewBlogPost($year, $month, $post_id, Request $request)
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
            ['title' => 'Post', 'url' => null, 'status' => false],
        ];
        $dataTagTemp = (new TagService())->getTags($request);
        $dataPost = (new PostService())->getPostById($year, $month, $post_id, $request);
        $dataTag = [];
        if(!empty($dataPost->tag_id)){
            foreach(json_decode($dataPost->tag_id) as $v){
                foreach($dataTagTemp as $kk => $vv){
                    if($vv->id == $v){
                        array_push($dataTag, $vv);
                    }
                }
            }
        }
        $dataCategory = (new CategoryService())->getCategory($request);
        $routeSearch = route('route.blog.post.search', [$year, $month, $post_id]);
        $dataMonths = $this->getMonths();
        $dataHistory = (new PostService())->getHistory();
        $dataShare = (new ShareService())->getDataSharePost($dataPost);
        return view('pages.post', compact('dataBreadcrumb', 'dataCategory', 'dataPost', 'routeSearch', 'dataMonths', 'dataHistory', 'dataTag', 'dataShare'));
    }

    function viewBlogSearch(Request $request)
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
            ['title' => 'Search', 'url' => null, 'status' => false],
        ];
        $routeSearch = route('route.blog.search');
        $dataSearch = (new PostService())->getSearch($request);
        return view('pages.search', compact('dataBreadcrumb', 'routeSearch', 'dataSearch'));
    }

    function viewBlogPostSearch($year, $month, $post_id, Request $request)
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Blog', 'url' => route('route.blog'), 'status' => true],
            ['title' => 'Post', 'url' => route('route.blog.post', [$year, $month, $post_id]), 'status' => true],
            ['title' => 'Search', 'url' => null, 'status' => false],
        ];
        $routeSearch = route('route.blog.post.search', [$year, $month, $post_id]);
        $dataSearch = (new PostService())->getSearch($request);
        return view('pages.search', compact('dataBreadcrumb', 'routeSearch', 'dataSearch'));
    }
}