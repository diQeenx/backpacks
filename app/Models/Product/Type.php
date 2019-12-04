<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
