<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line_items extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'item_total',
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function Orders(){
        return $this->belongsTo(Orders::class);
    }

    public function Products(){
        return $this->hasMany(Products::class);
    }
}
