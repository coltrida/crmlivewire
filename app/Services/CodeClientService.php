<?php

namespace App\Services;

use App\Models\Codeclient;

class CodeClientService
{
    public function list()
    {
        return Codeclient::orderBy('name')->get();
    }

    public function findIdFromName($name)
    {
        return Codeclient::where('name', $name)->first()->id;
    }
}
