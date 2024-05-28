<?php

namespace App\Services;

use App\Models\Client;

class TrialService
{
    public function clientWithTrials($idClient)
    {
        return Client::with('trials')->find($idClient);
    }
}
