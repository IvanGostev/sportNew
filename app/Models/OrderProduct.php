<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = false;

    public function product()
    {
        $product = Product::where('id', $this->product_id)->first();
        if ($product) {
            return $product;
        } else {
            return Product::withTrashed()->where('id', $this->product_id)->first();
        }
    }
}
