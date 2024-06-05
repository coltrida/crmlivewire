<?php

namespace App\Livewire\Admin\Audiometrie;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AudiometriaPaziente extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
        $this->idClient = $idClient;
        if (session('audiometria')){
            Alert::success('Ottimo', session('audiometria'));
        }
    }

    public function render()
    {
        return view('livewire.admin.audiometrie.audiometria-paziente')->layout('layouts.app');
    }
}
