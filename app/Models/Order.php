<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;


    public function productCount() {
        $count = 0;
        $products = OrderProduct::where('order_id', $this->id)->get();
        foreach ($products as $product) {
            $count += $product->qty;
        }
        return $count;
    }
    public function products() {
        return OrderProduct::where('order_id', $this->id)->get();
    }
    public function user() {
        return User::where('id', $this->user_id)->first();
    }
    public function totalPrice() {
        $sum = 0;
        $products = OrderProduct::where('order_id', $this->id)->get();
        foreach ($products as $product) {
            $sum += $product->price * $product->qty;
        }
        return $sum;
    }
}
