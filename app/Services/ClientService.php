<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function clientOfShopWithSearchPaginate($shopId, $search)
    {
        if ($search){
            return Client::with('codeclient')
                ->where([
                    ['shop_id', $shopId],
                    ['fullname', 'like', '%'.$search.'%']
                ])
                ->orWhere([
                    ['shop_id', $shopId],
                    ['fullnamereverse', 'like', '%'.$search.'%']
                ])
                ->paginate(5);
        }

        return Client::with('codeclient')
            ->where('shop_id', $shopId)
            ->paginate(5);
    }
}
