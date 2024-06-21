<?php

namespace App\Livewire\Pages\Audiometrie;

use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class AudiometriaPaziente extends Component
{
    public int $idClient;
    public int $idAudiometria;

    public function mount($idClient, $idAudiometria=0)
    {
        $this->idClient = $idClient;
        $this->idAudiometria = $idAudiometria;

        if (session('audiometria')){
            Alert::success('Ottimo', session('audiometria'));
        }
    }

    public function render()
    {
        return view('livewire.pages.audiometrie.audiometria-paziente')->layout('layouts.app');
    }
}
