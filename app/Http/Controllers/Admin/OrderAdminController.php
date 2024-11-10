<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderAdminController extends Controller
{

    public function index(Request $request)
    {
        $orders = Order::query();
        $data = $request->all();

        if (isset($data['status']) and $data['status'] != 'all') {
            $orders->where('status', 'LIKE', "%{$data['status']}%");
        }

        $orders = $orders->where('paid', 1)->latest()->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    function show(Order $order) {
        return view('admin.order.show', compact('order'));
    }


    function update(Request $request, Order $order) {
        $order->update(['status' => $request->status]);
        return back();
    }

    function destroy(Order $order) {
        $order->delete();
        return back();
    }

}
