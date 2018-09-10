<?php

namespace App\Http\Controllers;

use App\Http\Services\TechnologyService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    function viewAbout(Request $request)
    {
        $dataTecnologies  = (new TechnologyService())->getAll($request);
        return view('pages.about',compact('dataTecnologies'));
    }
}
