<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(8);
        return view('products', compact('products'));
    }
    public function show(Product $product)
    {
        $products = Product::where('id', '!=', $product->id)->take(4)->get();
        return view('product', compact('product', 'products'));
    }
}
