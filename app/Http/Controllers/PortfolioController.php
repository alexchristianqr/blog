<?php

namespace App\Http\Controllers;

use App\Http\Services\PortfolioService;
use Exception;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    function viewPortfolio(Request $request)
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Portfolio', 'url' => null, 'status' => false],
        ];
        $dataPortfolio = (new PortfolioService())->getPortfolios($request);
        return view('pages.portfolio.portfolio', compact('dataPortfolio', 'dataBreadcrumb'));
    }

    function viewPorfolioItem($portfolio_kind, Request $request)
    {
        $dataBreadcrumb = [
            ['title' => 'Home', 'url' => route('route.home'), 'status' => true],
            ['title' => 'Portfolio', 'url' => route('route.portfolio'), 'status' => true],
            ['title' => 'Project', 'url' => null, 'status' => false],
        ];
        $dataPortfolioProject = (new PortfolioService())->getPortfolioProject($portfolio_kind, $request);
        return view('pages.portfolio.portfolio-item', compact('dataPortfolioProject', 'dataBreadcrumb'));
    }

    function getPortfolios(Request $request)
    {
        try{
            $dataPortfolios = (new PortfolioService())->getAll($request);
            return response()->json($dataPortfolios, OK);
        }catch(Exception $e){
            return response()->json($e->getMessage(), PRECONDITION_FAILED);
        }
    }
}
