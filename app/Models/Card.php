<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(UsersDetail::class);
    }
}
