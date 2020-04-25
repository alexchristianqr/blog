<?php
/**
 * Created by Alex Christian
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;


use App\Technology;

class TechnologyService
{
    private function dataModel($request)
    {
        //Data Model
        $dataModel = Technology::select('technologies.*', 'path.name AS path_name')
            ->join('path', 'path.id', 'technologies.path_id');

        //Status
        if($request->has('status')) $dataModel = $dataModel->where('technologies.status', $request->status);

        //OrderField
        if($request->has('orderBy')) $dataModel = $dataModel->orderBy(($request->has('orderField')) ? $request->orderField : 'technologies.updated_at', 'DESC');

        //First
        if($request->has('first')) return $dataModel->first();

        //Get
        else return $dataModel->get();
    }

    function getAll($request)
    {
        $request->request->add(['orderBy' => true, 'status' => 'A']);
        return $this->dataModel($request);
    }
}