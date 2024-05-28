<?php

namespace App\Livewire\Admin\Prove;

use App\Services\TrialService;
use Livewire\Component;

class ProvaPaziente extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
        $this->idClient = $idClient;
    }

    public function render(TrialService $trialService)
    {
        return view('livewire.admin.prove.prova-paziente', [
            'clientWithTrials' => $trialService->clientWithTrials($this->idClient)
        ])->layout('layouts.app');
    }
}
