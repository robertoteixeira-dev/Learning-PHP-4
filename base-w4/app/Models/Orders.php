<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'item_count',
        'sub_total',
        'shipping',
        'taxes',
        'grand_total',
        'placed_at',
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function Products(){
        return $this->hasMany(Products::class);
    }

    public function Customer(){
        return $this->belongsTo(Customers::class);
    }
}
