<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productList()
    {
        return $this->belongsTo(ProductList::class);
    }

    public function productState()
    {
        return $this->belongsTo(ProductState::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
