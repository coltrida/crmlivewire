<?php

namespace App\Livewire\Pages\Audiometrie;

use App\Services\AudiometricService;
use Livewire\Component;

class ListaAudiometrie extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
        $this->idClient = $idClient;
    }

    public function selezionaAudiometria($idAudiometria)
    {
        $this->dispatch('audiometric-selected', idAudiometria: $idAudiometria);
    }

    public function render(AudiometricService $audiometricService)
    {
        return view('livewire.pages.audiometrie.lista-audiometrie', [
            'audiometrics' => $audiometricService->lista($this->idClient)
        ])->layout('layouts.app');
    }
}

