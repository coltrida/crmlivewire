<?php

namespace App\Services;

use App\Models\Canal;

class CanaliService
{
    public function lista()
    {
        return Canal::orderBy('name')->get();
    }
}
