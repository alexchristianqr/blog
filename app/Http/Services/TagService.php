<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;


use App\Tag;

class TagService
{
    function getTags()
    {
        return Tag::where('status','A')->get();
    }
}