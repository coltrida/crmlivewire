<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Phone;

class PhoneService
{
    public function clientByIdWithPhones($idClient)
    {
        return Client::with(['phones' => function($p){
            $p->latest();
        }])->find($idClient);
    }

    public function salvaTelefonata($request)
    {
        Phone::create($request);
    }
}
