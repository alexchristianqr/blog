<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;


use App\Path;

class PathService
{
    private function dataModel($request)
    {
        $dataModel = Path::select();
        if($request->has('status')) $dataModel = $dataModel->where('status',$request->status);
        if($request->has('first')) return $dataModel->first();
        else return $dataModel->get();
    }

    function getPaths($request)
    {
        return $this->dataModel($request);
    }
}