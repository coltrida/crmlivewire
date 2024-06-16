<?php

namespace App\Livewire\Admin\Appuntamenti;

use App\Models\Client;
use App\Services\AppointmentService;
use App\Services\ClientService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;


class Agenda extends Component
{
    public Client $client;
    public $events = [];

    public function mount($idClient, ClientService $clientService, AppointmentService $appointmentService)
    {
        $this->client = $clientService->clientById($idClient);

        $this->events = $appointmentService->listaAppuntamentiDellaSettimanaByIdAudio(Auth::id());

        foreach ($this->events as $item){
            $item->title = $clientService->clientById($item->client_id)->fullname;
            $item->allDay = false;
            unset($item->user_id);
        }
    }

    #[On('spostaEvento')]
    public function spostaEvento($evento, AppointmentService $appointmentService)
    {
        /*$evento['user_id'] = Auth::id();
        $evento['client_id'] = $evento['extendedProps']['client_id'];
        $evento['start'] = Carbon::make($evento['start']);
        unset($evento['extendedProps']);
        unset($evento['title']);
        unset($evento['allDay']);*/
        $appointmentService->modifica($evento);
        $this->redirectRoute('admin.clienti.telefonate', $this->client->id);
    }

    public function render()
    {
        return view('livewire.admin.appuntamenti.agenda')->layout('layouts.app');
    }
}
