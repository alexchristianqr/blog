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
        //Data Model
        $dataModel = Path::select();

        //Status
        if($request->has('status')) $dataModel = $dataModel->where('status', $request->status);

        //First
        if($request->has('first')) return $dataModel->first();

        //Get
        else return $dataModel->get();
    }

    //Funcion que lista la tabla "path" con request explicitos
    function getPaths($request)
    {
        $request->request->add(['status' => 'A']);//Filtrar por estado "A"
        return $this->dataModel($request);
    }

    //Funcion que lista la tabla "path" con request dinamicos
    function all($request)
    {
        return $this->dataModel($request);
    }
}