<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Pesanan;

class CartController extends Controller
{
    public function list()
    {
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    public function add(Menu $menu, Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->nama,
            'price' => $request->harga,
            'quantity' => $request->jumlah,
            'associatedModel' => $menu
        ]);

        session()->flash('success', 'Produk telah ditambahkan ke keranjang');

        return redirect()->route('cart.list');
    }

    public function refresh(Request $request)
    {
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ]
        ]);
        return redirect()->route('cart.list');
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Product successfully removed from cart!');

        return redirect()->route('cart.list');
    }

    public function addToDb()
    {
        $cartItems = \Cart::getContent();
        // Pesanan::add([
        //     'menu_id'
        // ]);
    }
}
