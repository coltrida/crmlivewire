<?php

namespace App\Livewire\Admin\Clienti;

use App\Services\ClientService;
use Livewire\Component;

class RiepilogoClient extends Component
{
    public function render(ClientService $clientService)
    {
        return view('livewire.admin.clienti.riepilogo-client', [
            'riepilogoAllClients' => $clientService->riepilogoAllClients()
        ])->layout('layouts.app');
    }
}
