<?php

namespace App\Http\Controllers;

use App\Http\Services\TechnologyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function viewHome(Request $request)
    {
        $dataImages = DB::table('home')->join('path', 'path.id', 'home.path_id')->select('home.*', 'path.name AS path_name')->get();
        $dataCourses = DB::table('courses')->join('path', 'path.id', 'courses.path_id')->select('courses.*', 'path.name AS path_name')->get();
        $dataImagesFrontend = DB::table('courses')->join('path', 'path.id', 'courses.path_id')->select('courses.*', 'path.name AS path_name')->where('type', 'frontend')->get();
        $dataImagesBackend = DB::table('courses')->join('path', 'path.id', 'courses.path_id')->select('courses.*', 'path.name AS path_name')->where('type', 'backend')->get();
        $dataImagesCss = DB::table('courses')->join('path', 'path.id', 'courses.path_id')->select('courses.*', 'path.name AS path_name')->where('type', 'css')->get();
        $dataImagesMobile = DB::table('courses')->join('path', 'path.id', 'courses.path_id')->select('courses.*', 'path.name AS path_name')->where('type', 'mobile')->get();


        //        $dataImagesFrontend = DB::table('home')->join('path', 'path.id', 'home.path_id')->select('home.*', 'path.name AS path_name')->where('type', 'frontend')->get();
//        $dataImagesBackend = DB::table('home')->join('path', 'path.id', 'home.path_id')->select('home.*', 'path.name AS path_name')->where('type', 'backend')->get();
//        $dataImagesCss = DB::table('home')->join('path', 'path.id', 'home.path_id')->select('home.*', 'path.name AS path_name')->where('type', 'css')->get();
//        $dataImagesMobile = DB::table('home')->join('path', 'path.id', 'home.path_id')->select('home.*', 'path.name AS path_name')->where('type', 'mobile')->get();
        $dataTecnologies = (new TechnologyService())->getAll($request);
        return view('pages.home', compact('dataImages', 'dataCourses', 'dataTecnologies', 'dataImagesFrontend', 'dataImagesBackend', 'dataImagesCss', 'dataImagesMobile'));
    }
}
