<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Builder;

class ClientService
{
    public function clientById($idClient)
    {
        return Client::find($idClient);
    }

    public function clientByIdPaginate($idClient)
    {
        return Client::with('codeclient', 'canal')
            ->where('id', $idClient)
            ->paginate(5);
    }

    public function clientByIdWithTrialUnderConstruction($idClient)
    {
        return Client::with('trialsUnderConstructions')->find($idClient);
    }

    public function riepilogoAllClients()
    {
        return Shop::
            withCount(['clients as cli' => function($q){
                $q->whereHas('codeclient', function ($z){
                    $z->where('name', 'CL');
                });
            }])
            ->withCount(['clients as pc' => function($q){
                $q->whereHas('codeclient', function ($z){
                    $z->where('name', 'PC');
                });
            }])
            ->withCount(['clients as clc' => function($q){
                $q->whereHas('codeclient', function ($z){
                    $z->where('name', 'CLC');
                });
            }])
            ->withCount(['clients as normo' => function($q){
                $q->whereHas('codeclient', function ($z){
                    $z->where('name', 'NU');
                });
            }])
            ->withCount(['clients as tappo' => function($q){
                $q->whereHas('codeclient', function ($z){
                    $z->where('name', 'TAPPO');
                });
            }])
            ->withCount(['clients as dec' => function($q){
                $q->whereHas('codeclient', function ($z){
                    $z->where('name', 'DEC');
                });
            }])
            ->withCount('clients as tot')
            ->orderBy('name')
            ->get();

    }

    public function clientOfShopWithSearchPaginate($shopId, $search)
    {
        if ($search){
            return Client::with('codeclient', 'canal')
                ->where([
                    ['shop_id', $shopId],
                    ['fullname', 'like', '%'.$search.'%']
                ])
                ->orWhere([
                    ['shop_id', $shopId],
                    ['fullnamereverse', 'like', '%'.$search.'%']
                ])
                ->latest()
                ->paginate(5);
        }

        return Client::with('codeclient', 'canal')
            ->where('shop_id', $shopId)
            ->latest()
            ->paginate(5);
    }

    public function elimina($idClient)
    {
        Client::find($idClient)->delete();
    }

    public function changeCodeClient($idClient, $idCode)
    {
        Client::find($idClient)->update([
            'codeclient_id' => $idCode
        ]);
    }
}
