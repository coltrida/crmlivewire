<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function trials()
    {
        return $this->hasMany(Trial::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
