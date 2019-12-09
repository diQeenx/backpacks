<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $fillable = [
        'product_id',
        'color_id',
        'count',
        'image'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
