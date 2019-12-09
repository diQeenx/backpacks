<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name'
    ];

    public function productDetails()
    {
        return $this->hasMany(ProductDetails::class);
    }
}
