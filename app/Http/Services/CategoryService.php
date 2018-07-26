<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 10/06/2018
 * Time: 05:59 PM
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