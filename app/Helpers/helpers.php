<?php

use App\Models\OrderProduct;
use App\Models\Product;
use Surfsidemedia\Shoppingcart\Facades\Cart;

function getProductById($id) {
    return Product::where('id', $id)->first();
}

function checkProductInCart($id): bool
{
    $products = Cart::instance('cart')->content()->pluck('id')->toArray();
    return in_array($id, $products);
}

function productCount($products) {
    $count = 0;
    foreach ($products as $product) {
        $count += $product->qty;
    }
    return $count;
}
