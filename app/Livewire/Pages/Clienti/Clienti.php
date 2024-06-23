<?php

namespace App\Livewire\Pages\Clienti;

use App\Models\Shop;
use App\Services\ClientService;
use App\Services\ShopService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Gate;

class Clienti extends Component
{
    use WithPagination;

    public $idShop;
    public $search;
    public $idClient;

    public function mount($idShop, $idClient=null)
    {
        $shop = Shop::find($idShop);
        if (! Gate::allows('view-shop', $shop)) {
            abort(403);
        }

        $this->idClient = $idClient;
        $this->idShop = $idShop;
        $this->search = null;
        if (session('status')){
            Alert::success('Ottimo', session('status'));
        }
    }

    public function elimina($idClient, ClientService $clientService)
    {
        $clientService->elimina($idClient);
    }

    public function render(ClientService $clientService, ShopService $shopService)
    {
        return view('livewire.pages.clienti.clienti', [
            'clientOfShopPaginate' =>
                $this->idClient
                    ? $clientService->clientByIdPaginate($this->idClient)
                    : $clientService->clientOfShopWithSearchPaginate($this->idShop, $this->search),
            'shopById' => $shopService->shopById($this->idShop)
        ])->layout('layouts.app');
    }
}

