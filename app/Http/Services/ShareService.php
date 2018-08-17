<?php
/**
 * Created by Alex Christian
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;


use App\Share;

class ShareService
{
    function getDataShare($dataPost)
    {
//        $dataShare = Share::select('post.*', 'share.url AS share_url')
//            ->join('post', 'post.id', 'share.post_id')
//            ->where('share.url', $post_id)->first();
        $newDataShare = (object)[
            'url' => request()->getUri(),
            'description' => $dataPost->description,
            'title' => $dataPost->name,
            'image' => $dataPost->image,
        ];
        return $newDataShare;
    }
}