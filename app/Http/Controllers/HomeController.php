<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function viewHome(Request $request)
    {
        $dataCourses = DB::table('courses')->join('path','path.id','courses.path_id')->select('courses.*','path.name AS path_name')->get();
        $dataImages = DB::table('home')->join('path','path.id','home.path_id')->select('home.*','path.name AS path_name')->get();
        return view('pages.home', compact('dataImages','dataCourses'));
    }
}
