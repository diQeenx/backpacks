<?php

namespace App\Models\Sale;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'total_price',
        'address',
        'payment_type',
        'card'
    ];

    public function products()
    {
        return $this->hasMany(SaleProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
