<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductAdminController extends Controller
{

    public function index(Request $request)
    {

        $products = Product::query();
        $data = $request->all();

        if (isset($data['title']) and $data['title'] == true) {
            $products->where('title', 'LIKE', "%{$data['title']}%");
        }

        $products = $products->latest()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    function create() {
        return view('admin.product.create');
    }

    function store(Request $request) {
        $data = $request->all();
        if (isset($data['image'])) {
            $data['image'] = '/storage/' . Storage::disk('public')->put('/images', $data['image']);
        }
        Product::create($data);
        return redirect()->route('admin.product.index');
    }

    function edit(Product $product) {
        return view('admin.product.edit', compact('product'));
    }
    function update(Request $request, Product $product) {
        $data = $request->all();
        if (isset($data['image'])) {
            $data['image'] = '/storage/' . Storage::disk('public')->put('/images', $data['image']);
        }
        $product->update($data);
        return redirect()->route('admin.product.index');
    }

    function destroy(Product $product) {
        $product->delete();
        return back();
    }

}
