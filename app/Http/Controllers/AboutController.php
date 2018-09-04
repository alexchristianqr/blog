<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function downloadWord()
    {
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename=example.csv');
        header('Pragma: no-cache');
        readfile("/path/to/yourfile.csv");
    }
}
