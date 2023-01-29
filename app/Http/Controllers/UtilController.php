<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public static function rupiahFormat($rupiah)
    {
        return preg_replace("/(\d)(?=(\d\d\d)+(?!\d))/", "$1.", $rupiah);
    }
}
