<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
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
}
