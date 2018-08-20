<?php
/**
 * Created by Alex Christian
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\Share;

class ShareService
{
    function getDataSharePost($dataPost)
    {
        $dataShare = Share::where('post_id', 6)->first();
        $newDataShare = (object)[
            'url' => request()->getUri(),
            'description' => $dataPost->description,
            'title' => $dataPost->name,
            'image' => $dataPost->path_name . $dataPost->image,
            'locale' => $dataShare->locale,
        ];
        return $newDataShare;
    }
}