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
        $dataShare = Share::where('post_id', $dataPost->id)->first();
        $newDataShare = (object)[
            'url' => request()->getUri(),
            'description' => $dataPost->description,
            'title' => $dataPost->name,
            'image' => $dataPost->path_name . $dataPost->image,
            'locale' => $dataShare->locale,
        ];
        return $newDataShare;
    }

    function getDataShareHome()
    {
        $newDataShare = (object)[
            'url' => 'https://acqrdeveloper.com/',
            'description' => 'Lo mejor en cursos, teorias, codigo fuente entre otros.',
            'title' => 'Portfolio, Posts, Contact',
            'image' => 'http://acqrdeveloper.com/images/ux_developer.jpg',
            'locale' => 'es-Es',
        ];
        return $newDataShare;
    }
}