<?php

namespace App\Livewire\Pages\Appuntamenti;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AppuntamentiPaziente extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
        $this->idClient = $idClient;
        if (session('appuntamento')){
            Alert::success('Ottimo', session('appuntamento'));
        }
    }

    public function render()
    {
        return view('livewire.pages.appuntamenti.appuntamenti-paziente')->layout('layouts.app');
    }
}
