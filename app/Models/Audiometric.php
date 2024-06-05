<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiometric extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function d250(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function d500(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function d1000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function d2000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function d6000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function d8000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function s250(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function s500(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function s1000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function s2000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function s6000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    protected function s8000(): Attribute
    {
        return Attribute::make(
            set: fn (int $value) => -($value),
        );
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
