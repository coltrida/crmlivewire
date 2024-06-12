<?php

namespace App\Livewire\Admin\Appuntamenti;

use App\Models\Client;
use App\Services\ClientService;
use Livewire\Component;

class Agenda extends Component
{
    public Client $client;

    public function mount($idClient, ClientService $clientService)
    {
        $this->client = $clientService->clientById($idClient);
    }

    public function render()
    {
        return view('livewire.admin.appuntamenti.agenda')->layout('layouts.app');
    }
}
