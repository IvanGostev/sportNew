<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index()
    {
        $products = Cart::instance('cart')->content();
        $total = Cart::instance('cart')->subTotal();
        return view('cart', compact('products', 'total'));
    }

    public function store(Request $request, Product $product)
    {
        Cart::instance('cart')->add(
            [
                'id' => $product->id,
                'name' => $product->title,
                'qty' => $request->quantity,
                'price' => $product->price,
                'options' => ['description' => $product->description]
            ])->associate(Product::class);

        return back();
    }

    public function quantity($rowId, Request $request)
    {
        Cart::instance('cart')->update($rowId, $request->quantity);
        return redirect()->back();
    }

    public function delete($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function empty()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }
}
