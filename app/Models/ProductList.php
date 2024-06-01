<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPrizeFormattatoAttribute()
    {
        return $this->prize ? '€ '.number_format( (float) $this->prize, '2', ',', '.') : null;
    }

    public function getCostFormattedAttribute()
    {
        return '€ '.number_format($this->cost, 2, ',', '.');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
