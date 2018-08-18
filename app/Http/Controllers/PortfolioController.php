<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Http\Services\ShareService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    function viewPortfolio(Request $request)
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Portfolio', 'url' => null, 'status' => false],
        ];
        $dataShare = (new ShareService())->getDataShareHome();
        $dataPortfolio = (new PostService())->getPortafolios($request);
        return view('pages.portfolio', compact('dataPortfolio', 'dataBreadcrumb', 'dataShare'));
    }
}
