<?php

namespace App\Http\Controllers;

use App\Http\Services\ShareService;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Utility;

    function viewHome()
    {
        $dataShare = (new ShareService())->getDataShareHome();
        return view('pages.home',compact('dataShare'));
    }

    function viewAbout()
    {
        return view('pages.about');
    }

    function viewContact()
    {
        $dataShare = (new ShareService())->getDataShareHome();
        return view('pages.contact',compact('dataShare'));
    }

    function viewService()
    {
        return view('pages.service');
    }
}
