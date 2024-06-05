<?php

namespace App\Livewire\Admin\Audiometrie;

use App\Models\Audiometric;
use App\Services\AudiometricService;
use Livewire\Component;

class VisualizzaAudiometria extends Component
{
    public int $client_id;
    public int $showCreaAudiometria = 0;
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

    public function mount($idClient, AudiometricService $audiometricService)
    {
        $this->client_id = $idClient;
        $this->audiometriaDXPaziente = $audiometricService->caricaAudiometriaPiuRecenteByIdClient($idClient)[0];
        $this->audiometriaSXPaziente = $audiometricService->caricaAudiometriaPiuRecenteByIdClient($idClient)[1];
    }

    public function caricaAudiometriaPaziente($idAudiometria, AudiometricService $audiometricService)
    {
        $this->audiometriaDXPaziente = $audiometricService->caricaAudiometriaById($idAudiometria);
    }

    public function creaAudiometria()
    {
        $this->showCreaAudiometria = 1;
    }

    public function insertAudiometria(AudiometricService $audiometricService)
    {
        $audiometricService->crea($this->except(['showCreaAudiometria', 'audiometriaDXPaziente', 'audiometriaSXPaziente']));
        $this->showCreaAudiometria = 0;
        session()->flash('audiometria', 'Audiometria inserita correttamente');
        $this->resetExcept('client_id');
        $this->redirect(route('admin.clienti.audiometria', $this->client_id));
    }

    public function render()
    {
        return view('livewire.admin.audiometrie.visualizza-audiometria')->layout('layouts.app');
    }
}
