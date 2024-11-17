<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function newCheckout(Request $request)
    {
        $qty = $request->qty;
        $data = [
            'qty' => $request->qty,
            'productId  ' => $request->productId,
        ];
        $product = Product::find($request->productId);
        if ($product->status != 'tersedia') {
            return back()->with('error', 'Produk tidak tersedia');
        }

        $harga = $product->price;
        $total = $harga * $qty;
        $data = [
            'qty' => $qty,
            'total' => $total,
            'product' => $product,
        ];
        return view('Pages.checkout')->with($data);
    }
}
