<?php

namespace App\Livewire\Admin;

use App\Services\ProductService;
use App\Services\ShopService;
use Livewire\WithPagination;
use Livewire\Component;

class Magazzini extends Component
{

    use WithPagination;

    public $shopId;

    public function mount($idShop)
    {
        $this->shopId = $idShop;
    }

    public function render(ProductService $productService, ShopService $shopService)
    {
        return view('livewire.admin.magazzini', [
            'productsOfShopPaginate' => $productService->productsOfShopPaginate($this->shopId),
            'shopById' => $shopService->shopById($this->shopId)
        ])->layout('layouts.app');
    }
}
