<?php

namespace App\Models\Sale;

use Illuminate\Database\Eloquent\Model;

class SaleProduct extends Model
{
    protected $fillable = [
        'sale_id',
        'name',
        'brand',
        'category',
        'color',
        'type',
        'qty',
        'price'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
