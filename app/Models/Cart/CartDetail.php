<?php

namespace App\Models\Cart;

use App\Models\Product\ProductDetails;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $guarded = [];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetails::class, 'product_details_id', 'id');
    }
}
