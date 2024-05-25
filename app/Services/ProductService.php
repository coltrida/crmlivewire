<?php

namespace App\Services;

use App\Models\Product;

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
}
