<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Product;
use App\Models\Trial;
use App\Models\TrialState;

class TrialService
{
    public function creaProva($client_id, $canal_id, $trial_state_id)
    {
        $trial = Trial::create([
            'client_id' => $client_id,
            'canal_id' => $canal_id,
            'trial_state_id' => $trial_state_id
        ]);
        return $trial;
    }

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
        $product = Product::find($idProduct);
        $product->update([
            'product_state_id' => $idStateApaInTrial
        ]);

        $prova = Trial::find($idTrial);
        $prova->products()->attach($product->id);
    }

    public function togliProductInTrial($idProduct, $idTrial, $idStateApaInMagazzino)
    {
        $product = Product::find($idProduct);
        $product->update([
            'product_state_id' => $idStateApaInMagazzino
        ]);

        $prova = Trial::find($idTrial);
        $prova->products()->detach($product->id);
    }

    public function salvaProva($idTrial, $idStateTrialInCorso)
    {
        $trial = Trial::with(['products' => function($p){
            $p->with('productList');
        }])->find($idTrial);
       // dd($trial->products);
        $trial->importoTot = $trial->products->sum('productList.prize');
        $trial->trial_state_id = $idStateTrialInCorso;
        $trial->save();
    }

    public function listaProveTranneInProgress($idClient)
    {
        return Client::with(['trials' => function($t){
            $t->whereDoesntHave('trialState', function ($t){
                $t->where('name', 'Under Construction');
            })->with('trialState', 'canal');
        }])->find($idClient)->trials;
    }

    public function reso($idProva, $idStatoReso)
    {
        Trial::find($idProva)->update([
            'trial_state_id' => $idStatoReso
        ]);
    }

    public function provaPositiva($idProva, $idStatoPositivo)
    {
        Trial::find($idProva)->update([
            'trial_state_id' => $idStatoPositivo
        ]);
    }
}
