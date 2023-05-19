<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 'menu_id', 'quantity', 'price', 'status', 
    ];

    public function customers()
    {
        return $this->belongsTo('App\Models\Customer', 'id','customer_id');
    }

    public function menus()
    {
        // return $this->hasMany('App\Models\Menu','id', 'menu_id');
        return $this->hasOne(Menu::class, 'id', 'menu_id');
    }
}
