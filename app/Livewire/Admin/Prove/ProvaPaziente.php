<?php

namespace App\Livewire\Admin\Prove;

use App\Services\TrialService;
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
        return view('livewire.admin.prove.prova-paziente')->layout('layouts.app');
    }
}
