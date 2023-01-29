<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function list()
    {
        $pesanans = Pesanan::all();
        // $pesanan = Pesanan::find(1);
        // dd($pesanan->makanan[0]['menu_id']);
        return view('pesanan', compact('pesanans'));
    }

    public function add(Request $request)
    {
        $cartItems = \Cart::getContent();
        $makanan_json = array();
        foreach ($cartItems as $menu) {
            $push = array("menu_id" => $menu->id, "jumlah" => $menu->quantity);
            array_push($makanan_json, $push);
        }

        Pesanan::create([
            'meja_id' => 1,
            'makanan' => $makanan_json
        ]);

        foreach ($cartItems as $menu) {
            \Cart::remove($menu->id);
        }
        return redirect()->route('product.list');
    }

    public function remove(Request $request)
    {
        Pesanan::where('id', $request->id)->delete();
        return redirect()->route('pesanan.list');
    }
}
