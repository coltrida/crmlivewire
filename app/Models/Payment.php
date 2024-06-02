<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getimportoFormattatoAttribute()
    {
        return $this->importo ? '€ '.number_format( (float) $this->importo, '2', ',', '.') : null;
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
