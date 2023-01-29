<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function list()
    {
        $food_menus = Menu::where('keterangan', 'makanan')->get();
        $drink_menus = Menu::where('keterangan', 'minuman')->get();
        return view('order', compact('food_menus', 'drink_menus'));
    }
}
