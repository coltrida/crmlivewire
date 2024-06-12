<?php

namespace App\Livewire\Admin\Telefonate;

use App\Models\Client;
use App\Services\ClientService;
use App\Services\PhoneService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreaTelefonata extends Component
{
    public Client $client;
    public string $esito;
    public string $note;
    public int $client_id;
    public int $user_id;

    public function mount($idClient, PhoneService $phoneService)
    {
        $this->client = $phoneService->clientByIdWithPhones($idClient);
        $this->client_id = $idClient;
        $this->user_id = Auth::id();
    }

    public function salvaTelefonata(PhoneService $phoneService)
    {
        $phoneService->salvaTelefonata($this->except('client'));
        $this->reset('esito', 'note');
    }

    public function render()
    {
        return view('livewire.admin.telefonate.crea-telefonata');
    }
}
