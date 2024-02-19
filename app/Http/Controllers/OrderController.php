<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required|array',
            'stopa_poreza' => 'required|numeric',
            'ime_prezime' => 'required|string',
            'email' => 'required|email',
            'broj_telefona' => 'required|string',
            'adresa' => 'required|string',
            'grad' => 'required|string',
            'drzava' => 'required|string',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'updated_at' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $products = $request->input('products');
        $totalPrice = array_reduce($products, function ($carry, $product) {
            return $carry + ($product['price'] * $product['quantity']);
        }, 0);

        $discount = $totalPrice > 100 ? 10 : 0;

        $order = new Order([
            'total_price' => $totalPrice,
            'products' => json_encode($request->input('products')),
            'stopa_poreza' => $request->input('stopa_poreza'),
            'popust' => $discount,
            'ime_prezime' => $request->input('ime_prezime'),
            'email' => $request->input('email'),
            'broj_telefona' => $request->input('broj_telefona'),
            'adresa' => $request->input('adresa'),
            'grad' => $request->input('grad'),
            'drzava' => $request->input('drzava'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
        ]);

        $order->save();

        return response()->json(['status' => 'Narudžba uspješno dodana']);
    }
}
