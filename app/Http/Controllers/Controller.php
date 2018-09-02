<?php

namespace App\Http\Controllers;

use App\Http\Services\ShareService;
use App\Http\Services\TechnologyService;
use App\Technology;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Utility;

    function viewHome()
    {
        return view('pages.home');
    }

    function viewAbout(Request $request)
    {
        $dataTecnologies  = (new TechnologyService())->getAll($request);
        return view('pages.about',compact('dataTecnologies'));
    }

    function viewContact()
    {
        return view('pages.contact');
    }

    function viewService()
    {
        return view('pages.service');
    }
}
