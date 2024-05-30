<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Product;
use App\Models\TrialState;

class TrialService
{
    public function clientWithTrials($idClient)
    {
        return Client::with('trials')->find($idClient);
    }

    public function idTrialStateByName($name)
    {
        return TrialState::where('name', $name)->first()->id;
    }

    public function insertProductInTrial($idProduct, $idTrial, $idStateApaInTrial)
    {
        Product::find($idProduct)->update([
            'trial_id' => $idTrial,
            'product_state_id' => $idStateApaInTrial
        ]);
    }
}
