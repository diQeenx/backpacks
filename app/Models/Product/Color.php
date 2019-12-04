<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function productDetails()
    {
        return $this->hasMany(ProductDetails::class);
    }
}
