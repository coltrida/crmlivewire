<?php

namespace App\Services;

use App\Models\User;

class UsersService
{
    public function mieFiliali()
    {
        return User::with('shops')->find(auth()->id())->shops;
    }
}
