<?php

namespace App\Livewire\Pages\Appuntamenti;

use App\Models\Client;
use App\Services\AppointmentService;
use App\Services\ClientService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;


class Agenda extends Component
{
    public Client $client;
    public $events = [];
    public $evento = [];
    public $listaTipiAppuntamenti = [];
    public $note;
    public $showModalTypeAppointment = 0;
    public $dataTimeAppointmentSelected;
    public int $appointment_type_id;


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
        $appointmentService->modifica($evento);
        $this->redirectRoute('admin.clienti.telefonate', $this->client->id);
    }

    #[On('dataTimeSelected')]
    public function dataTimeSelected($dataOra, AppointmentService $appointmentService)
    {
        $this->dataTimeAppointmentSelected = Carbon::make($dataOra);
        $this->listaTipiAppuntamenti = $appointmentService->listaTipiAppuntamenti();
        $this->showModalTypeAppointment = 1;
        /*$this->evento['user_id'] = Auth::id();
        $this->evento['client_id'] = $this->client->id;
        $this->evento['start'] = Carbon::make($dataOra);
        $appointmentService->crea($this->evento);
        $this->redirectRoute('admin.clienti.telefonate', $this->client->id);*/
    }

    public function cancelPrenotaAppuntamento()
    {
        $this->showModalTypeAppointment = 0;
        $this->redirectRoute('admin.clienti.appuntamenti', $this->client->id);
    }

    public function salvaAppuntamento(AppointmentService $appointmentService)
    {
        $this->evento['user_id'] = auth()->id();
        $this->evento['client_id'] = $this->client->id;
        $this->evento['appointment_type_id'] = $this->appointment_type_id;
        $this->evento['note'] = $this->note;
        $this->evento['start'] = $this->dataTimeAppointmentSelected;
        $appointmentService->crea($this->evento);

        session()->flash('appuntamento', 'appuntamento salvato con successo');
        $this->redirect(route('admin.clienti.appuntamenti', $this->client->id));
    }

    public function render()
    {
        return view('livewire.pages.appuntamenti.agenda')->layout('layouts.app');
    }
}

