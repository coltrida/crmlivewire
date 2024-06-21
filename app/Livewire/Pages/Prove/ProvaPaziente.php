<?php

namespace App\Livewire\Pages\Prove;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class ProvaPaziente extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
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

