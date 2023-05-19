<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'image', 'price', 'description','quantity'
    ];

    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'id');
    }
}
