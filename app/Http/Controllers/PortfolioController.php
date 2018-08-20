<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    function viewPortfolio(Request $request)
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Portfolio', 'url' => null, 'status' => false],
        ];
        $dataPortfolio = (new PostService())->getPortafolios($request);
        return view('pages.portfolio', compact('dataPortfolio', 'dataBreadcrumb'));
    }
}
