<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Customer extends Authenticable
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'city', 'street'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
