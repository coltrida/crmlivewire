<?php

namespace App\Livewire\Admin;

use App\Services\ClientService;
use App\Services\ShopService;
use Livewire\Component;
use Livewire\WithPagination;

class Clienti extends Component
{
    use WithPagination;

    public $shopId;
    public $search;

    public function mount($idShop)
    {
        $this->shopId = $idShop;
        $this->search = null;
    }

    public function render(ClientService $clientService, ShopService $shopService)
    {
        return view('livewire.admin.clienti', [
            'clientOfShopPaginate' => $clientService->clientOfShopWithSearchPaginate($this->shopId, $this->search),
            'shopById' => $shopService->shopById($this->shopId)
        ])->layout('layouts.app');
    }
}
