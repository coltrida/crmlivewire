<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getDataFinalizzatoResoFormattatoAttribute()
    {
        return $this->dataFinalizzatoReso ? Carbon::make($this->dataFinalizzatoReso)->format('d/m/Y') : null;
    }

    public function getGiorniInProvaAttribute()
    {
        $now = Carbon::now();
        $giorno = Carbon::make($this->created_at);
        return !$this->dataFinalizzatoReso ?
            number_format($giorno->diffInDays($now), '0', ',', '.')
            : null;
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

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
