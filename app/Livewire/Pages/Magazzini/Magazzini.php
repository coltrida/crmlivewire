<?php

namespace App\Livewire\Pages\Magazzini;

use App\Models\Shop;
use App\Services\ProductService;
use App\Services\ShopService;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Magazzini extends Component
{

    use WithPagination;

    public $shopId;

    public function mount($idShop)
    {
        $shop = Shop::find($idShop);
        if (! Gate::allows('view-shop', $shop)) {
            abort(403);
        }

        $this->shopId = $idShop;
    }

    public function render(ProductService $productService, ShopService $shopService)
    {
        return view('livewire.pages.magazzini.magazzini', [
            'productsOfShopPaginate' => $productService->productsOfShopPaginate($this->shopId),
            'shopById' => $shopService->shopById($this->shopId)
        ])->layout('layouts.app');
    }
}
