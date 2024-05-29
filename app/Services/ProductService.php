<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductState;

class ProductService
{
    public function productsOfShopPaginate($shopId)
    {
        return Product::
            with(['productState','productList' => function($pr){
                $pr->with('supplier');
            }])
            ->where('shop_id', $shopId)
                ->paginate(5);
    }

    public function prodottiOfListinoInFilialeById($shopId, $listinoId, $idStateApaInFiliale)
    {
        return Product::with('productList')->where([
            ['shop_id', $shopId],
            ['product_list_id', $listinoId],
            ['product_state_id', $idStateApaInFiliale],
        ])->get();
    }

    public function idProductStateByName($name)
    {
        return ProductState::where('name', $name)->first()->id;
    }
}
