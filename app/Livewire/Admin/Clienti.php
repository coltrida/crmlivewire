<?php

namespace App\Livewire\Admin;

use App\Services\ClientService;
use App\Services\ShopService;
use Livewire\Component;
use Livewire\WithPagination;

class Clienti extends Component
{
    use WithPagination;

    public $idShop;
    public $search;

    public function mount($idShop)
    {
        $this->idShop = $idShop;
        $this->search = null;
    }

    public function elimina($idClient, ClientService $clientService)
    {
        $clientService->elimina($idClient);
    }

    public function render(ClientService $clientService, ShopService $shopService)
    {
        return view('livewire.admin.clienti', [
            'clientOfShopPaginate' => $clientService->clientOfShopWithSearchPaginate($this->idShop, $this->search),
            'shopById' => $shopService->shopById($this->idShop)
        ])->layout('layouts.app');
    }
}
