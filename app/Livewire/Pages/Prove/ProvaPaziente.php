<?php

namespace App\Livewire\Pages\Prove;

use App\Models\Client;
use App\Models\Shop;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class ProvaPaziente extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
        $shop = Shop::find(Client::find($idClient)->shop_id);
        if (! Gate::allows('view-shop', $shop)) {
            abort(403);
        }

        $this->idClient = $idClient;
        if (session('prova')){
            Alert::success('Ottimo', session('prova'));
        }
    }

    public function render()
    {
        return view('livewire.pages.prove.prova-paziente')->layout('layouts.app');
    }
}

