<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class SubscriptionController extends Controller
{

    public function index()
    {
        return view('subscriptions');
    }

    public function show()
    {
        return view('subscription');
    }
    public function buy()
    {

    }
}
