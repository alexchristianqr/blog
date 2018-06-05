<?php
/**
 * Created by PhpStorm.
 * User: aquispe
 * Date: 04/06/2018
 * Time: 08:37 PM
 */

namespace App\Http\Services;


use App\Post;

class PostService
{
  function getPost()
  {
    return Post::get();
  }
}