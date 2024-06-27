<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Phone;
use Carbon\Carbon;

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
        $request['effettuata'] = Carbon::now();
        Phone::create($request);
    }

    public function programmaTelefonata($request)
    {
        Phone::create($request);
    }

    public function listaTelefonataDaFareOggi()
    {
        $dataOggi = Carbon::now()->format('Y-m-d');
        return Phone::with('client')->where('recallDate', $dataOggi)->orderBy('recallTime')->get();
    }
}
