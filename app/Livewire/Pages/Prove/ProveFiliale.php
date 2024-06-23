<?php

namespace App\Livewire\Pages\Prove;

use App\Models\Shop;
use App\Services\ShopService;
use App\Services\TrialService;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class ProveFiliale extends Component
{
    use WithPagination;

    public $idShop;
    public $search;

    public function mount($idShop)
    {
        $shop = Shop::find($idShop);
        if (! Gate::allows('view-shop', $shop)) {
            abort(403);
        }

        $this->idShop = $idShop;
        $this->search = null;
    }

    public function render(TrialService $trialService, ShopService $shopService)
    {
        return view('livewire.pages.prove.prove-filiale', [
            'listaProveByIdFilialePaginate' => $trialService->listaProveByIdFilialePaginate($this->idShop, $this->search),
            'shopById' => $shopService->shopById($this->idShop)
        ])->layout('layouts.app');
    }
}
