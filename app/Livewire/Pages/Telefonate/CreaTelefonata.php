<?php

namespace App\Livewire\Pages\Telefonate;

use App\Models\Client;
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
        session()->flash('phone', $this->esito);
        $this->reset('esito', 'note');
        $this->redirect(route('admin.clienti.telefonate', $this->client->id));
    }

    public function render()
    {
        return view('livewire.pages.telefonate.crea-telefonata');
    }
}
