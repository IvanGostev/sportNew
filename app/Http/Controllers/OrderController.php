<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index()
    {
        $ordersActive = Order::where('user_id', auth()->user()->id)
            ->where('paid', 1)
            ->where('status', '!=', 'Доставлен')
            ->latest()->get();
        $ordersDelivery = Order::where('user_id', auth()->user()->id)
            ->where('paid', 1)
            ->where('status', 'Доставлен')
            ->latest()->get();
        return view('orders', compact('ordersActive', 'ordersDelivery'));
    }

    public function show(Order $order)
    {
        return view('order', compact('order'));
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $products = Cart::instance('cart')->content();
            if (count($products) < 1) {
                return back();
            }

            $order = Order::create([
                'user_id' => auth()->user()->id,
                'address' => $request->address,
                'platform_id' => $request->platform_id
            ]);

            foreach ($products as $product) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'qty' => $product->qty,
                    'price' => $product->price
                ]);
            }

            Cart::instance('cart')->destroy();

            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return back();
        }
        $payment = new PaymentController();
        return $payment->purchaseOrder($order);
    }
}
