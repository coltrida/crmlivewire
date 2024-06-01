<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImportoTotFormattatoAttribute()
    {
        return $this->importoTot ? '€ '.number_format( (float) $this->importoTot, '2', ',', '.') : null;
    }

    public function canal()
    {
        return $this->belongsTo(Canal::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function trialState()
    {
        return $this->belongsTo(TrialState::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
