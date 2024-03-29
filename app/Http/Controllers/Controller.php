<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Utility;

    function viewContact()
    {
        return view('pages.contact');
    }

    function viewService()
    {
        return view('pages.service');
    }

    function viewPolicies()
    {
        return view('pages.policies-terms');
    }
}