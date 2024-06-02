<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Product;
use App\Models\Trial;
use App\Models\TrialState;
use Carbon\Carbon;

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

    public function salvaProva($idTrial, $idStateTrialInCorso, $note)
    {
        $trial = Trial::with(['products' => function($p){
            $p->with('productList');
        }])->find($idTrial);
       // dd($trial->products);
        $trial->importoTot = $trial->products->sum('productList.prize');
        $trial->trial_state_id = $idStateTrialInCorso;
        $trial->note = $note;
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

    public function reso($idProva, $idStatoProvaReso, $idStatoProdottoInMagazzino)
    {
        $prova = Trial::with('products')->find($idProva);
        $prova->update([
            'trial_state_id' => $idStatoProvaReso,
            'dataFinalizzatoReso' => Carbon::now()
        ]);
        foreach ($prova->products as $prodotto){
            $prodotto->product_state_id = $idStatoProdottoInMagazzino;
            $prodotto->save();
        }
    }

    public function provaPositiva($idProva, $idStatoPositivo, $idStatoProdottoVenduto)
    {
        $prova = Trial::with('products')->find($idProva);
        $prova->update([
            'trial_state_id' => $idStatoPositivo,
            'dataFinalizzatoReso' => Carbon::now()
        ]);
        foreach ($prova->products as $prodotto){
            $prodotto->product_state_id = $idStatoProdottoVenduto;
            $prodotto->save();
        }
    }

    public function provaConProdotti($idProva)
    {
        return Trial::with(['trialState','products' => function($p){
            $p->with(['productList' => function($pl){
                $pl->with('supplier');
            }]);
        }])->find($idProva);
    }
}
