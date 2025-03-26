<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'product_id',
        'sale_id',
        'quantity',
        'price',
        'discount',
        'subtotal',
    ];
}
