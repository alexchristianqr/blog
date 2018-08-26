<?php
/**
 * Created by Alex Christian
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;


use App\Portfolio;

class PortfolioService
{
    private function dataModel($request)
    {
        //Data Model
        $dataModel = Portfolio::select('portfolio.*', 'path.name AS path_name')
            ->join('path', 'path.id', 'portfolio.path_id');

        //Portfolio_kind
        if($request->has('portfolio_kind')) $dataModel = $dataModel->where('portfolio.kind', $request->portfolio_kind);

        //Status
        if($request->has('status')) $dataModel = $dataModel->where('status', $request->status);

        //OrderField
        if($request->has('orderBy')) $dataModel = $dataModel->orderBy(($request->has('orderField')) ? $request->orderField : 'portfolio.updated_at', 'DESC');

        //Paginate
        if($request->has('paginate')){
            if($request->ajax()){//Javascript
                return $dataModel->paginate($request->paginate);
            }else{//Php
                if($request->has('simplePaginate')){//Si es un paginado simple
                    return $dataModel->simplePaginate($request->paginate);
                }else{//Si es un paginado enumerado
                    return $dataModel->paginate($request->paginate);
                }
            }
        }

        //First
        if($request->has('first')) return $dataModel->first();

        //Get
        else return $dataModel->get();
    }

    function getPortfolios($request)
    {
        $request->request->add([
            'paginate' => $request->has('paginate') ? $request->paginate : 3,
            'orderBy' => true,
        ]);
        return $this->dataModel($request);
    }

    function getAll($request)
    {
        $request->request->add(['orderBy' => true]);
        return $this->dataModel($request);
    }

    function getPortfolioProject($portfolio_kind, $request)
    {
        $request->request->add([
            'portfolio_kind' => $portfolio_kind,
            'first' => true
        ]);
        return $this->dataModel($request);
    }
}