<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'unit_price',
        'is_visible',
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function Orders(){
        return $this->hasMany(Orders::class);
    }

}
