<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function codeclient()
    {
        return $this->belongsTo(Codeclient::class);
    }

    public function canal()
    {
        return $this->belongsTo(Canal::class);
    }

    public function trials()
    {
        return $this->hasMany(Trial::class);
    }

    public function trialsUnderConstructions()
    {
        return $this->hasMany(Trial::class)->whereHas('trialState', function ($state){
            $state->where('name', 'Under Construction');
        });
    }

    public function audiometrics()
    {
        return $this->hasMany(Audiometric::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
