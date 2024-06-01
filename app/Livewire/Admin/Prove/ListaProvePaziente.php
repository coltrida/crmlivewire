<?php

namespace App\Livewire\Admin\Prove;

use App\Services\TrialService;
use Livewire\Component;

class ListaProvePaziente extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
        $this->idClient = $idClient;
    }

    public function reso($idProva, TrialService $trialService)
    {
        $idStatoReso = $trialService->idTrialStateByName('Reso');
        $trialService->reso($idProva, $idStatoReso);
    }

    public function positivo($idProva, TrialService $trialService)
    {
        $idStatoPositivo = $trialService->idTrialStateByName('Positiva');
        $trialService->provaPositiva($idProva, $idStatoPositivo);
    }

    public function render(TrialService $trialService)
    {
        return view('livewire.admin.prove.lista-prove-paziente', [
            'prove' => $trialService->listaProveTranneInProgress($this->idClient)
        ])->layout('layouts.app');
    }
}
