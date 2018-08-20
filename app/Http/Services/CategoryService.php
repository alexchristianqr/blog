<?php
/**
 * Created by Alex Christian.
 * Github: https://github.com/acqrdeveloper
 */

namespace App\Http\Services;

use App\Category;

class CategoryService
{
    static function getCategory($request)
    {
        return Category::where('status', 'A')->get();
    }
}