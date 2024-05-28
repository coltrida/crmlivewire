<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function canal()
    {
        return $this->belongsTo(Canal::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}