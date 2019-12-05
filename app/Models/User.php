<?php

namespace App\Models;

use App\Models\Cart\Cart;
use App\Models\Cart\CartDetail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function detail()
    {
        return $this->hasOne(UsersDetail::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function isAdmin()
    {
        return $this->role()->where('name', 'admin')->exists();
    }

    public function isUser()
    {
        return $this->role()->where('name', 'user')->exists();
    }

    public function cartItems()
    {
        return $this->hasManyThrough(CartDetail::class, Cart::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
