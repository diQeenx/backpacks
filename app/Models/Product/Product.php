<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function details()
    {
        return $this->hasMany(ProductDetails::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_details');
    }

    public function scopeOfCategory($query, $id) {
        if (isset($id)) {
            return $query->where('category_id', $id);
        }
    }

    public function scopeOfBrand($query, $id) {
        if (isset($id)) {
            return $query->where('brand_id', $id);
        }
    }

    public function scopeOfType($query, $id) {
        if (isset($id)) {
            return $query->where('type_id', $id);
        }
    }

    public function scopeOfPrice($query, $begin, $end) {
        if (isset($begin) && isset($end)) {
            return $query->whereBetween('price', [$begin, $end]);
        }
    }
}
