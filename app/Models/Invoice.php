<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trial()
    {
        return $this->belongsTo(Trial::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
