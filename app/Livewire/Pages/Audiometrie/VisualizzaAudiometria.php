<?php

namespace App\Livewire\Pages\Audiometrie;

use App\Models\Client;
use App\Services\AudiometricService;
use App\Services\ClientService;
use Livewire\Attributes\On;
use Livewire\Component;

class VisualizzaAudiometria extends Component
{
    public int $client_id;
    public int $showCreaAudiometria = 0;
    public Client $client;

    public $audiometriaDXPaziente;
    public $audiometriaSXPaziente;

    public int $s250;
    public int $s500;
    public int $s1000;
    public int $s2000;
    public int $s6000;
    public int $s8000;
    public int $d250;
    public int $d500;
    public int $d1000;
    public int $d2000;
    public int $d6000;
    public int $d8000;

    public function mount($idClient, $idAudiometria, AudiometricService $audiometricService, ClientService $clientService)
    {
        $this->client_id = $idClient;
        $this->client = $clientService->clientById($idClient);

        if ($idAudiometria){
            $this->audiometriaDXPaziente = $audiometricService->caricaAudiometriaById($idAudiometria)[0];
            $this->audiometriaSXPaziente = $audiometricService->caricaAudiometriaById($idAudiometria)[1];
        } else {
            $this->audiometriaDXPaziente = $audiometricService->caricaAudiometriaPiuRecenteByIdClient($idClient)[0];
            $this->audiometriaSXPaziente = $audiometricService->caricaAudiometriaPiuRecenteByIdClient($idClient)[1];
        }

    }

    #[On('audiometric-selected')]
    public function caricaAudiometriaPaziente($idAudiometria, AudiometricService $audiometricService)
    {
        $this->redirect(route('admin.clienti.audiometria',
            ['idClient' => $this->client_id, 'idAudiometria' => $idAudiometria]));
    }

    public function creaAudiometria()
    {
        $this->showCreaAudiometria = 1;
    }

    public function insertAudiometria(AudiometricService $audiometricService)
    {
        $audiometricService->crea($this->except(['showCreaAudiometria',
            'audiometriaDXPaziente', 'audiometriaSXPaziente', 'client']));
        $this->showCreaAudiometria = 0;
        session()->flash('audiometria', 'Audiometria inserita correttamente');
        $this->resetExcept('client_id');
        $this->redirect(route('admin.clienti.audiometria', $this->client_id));
    }

    public function render()
    {
        return view('livewire.pages.audiometrie.visualizza-audiometria')->layout('layouts.app');
    }
}
