<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;


use App\Tag;

class TagService
{
    private function dataModel($request)
    {
        //Data Model
        $dataModel = Tag::select();

        //Status
        if($request->has('status')) $dataModel = $dataModel->where('status', $request->status);

        //First
        if($request->has('first')) return $dataModel->first();

        //Get
        else return $dataModel->get();
    }

    function getTags($request)
    {
        $request->request->add(['status' => 'A']);//Filtrar por estado "A"
        return $this->dataModel($request);
    }

    function all($request)
    {
        return $this->dataModel($request);
    }
}