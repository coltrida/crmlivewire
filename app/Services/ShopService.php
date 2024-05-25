<?php

namespace App\Services;

use App\Models\Shop;

class ShopService
{
    public function shopById($idShop)
    {
        return Shop::find($idShop);
    }
}
