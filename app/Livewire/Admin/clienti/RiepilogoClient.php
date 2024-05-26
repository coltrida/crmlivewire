<?php

namespace App\Livewire\Admin\clienti;

use App\Services\ClientService;
use Livewire\Component;

class RiepilogoClient extends Component
{
    public function render(ClientService $clientService)
    {
       // dd($clientService->riepilogoAllClients());
        return view('livewire.admin.clienti.riepilogo-client', [
            'riepilogoAllClients' => $clientService->riepilogoAllClients()
        ])->layout('layouts.app');
    }
}
