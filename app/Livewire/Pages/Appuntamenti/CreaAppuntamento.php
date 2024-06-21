<?php

namespace App\Livewire\Pages\Appuntamenti;

use App\Models\Client;
use App\Services\AppointmentService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreaAppuntamento extends Component
{
    public int $client_id;
    public int $user_id;
    public Client $client;
    public $startDate;
    public $startTime;
    public int $appointment_type_id;
    public string|null $note = null;
    public $evento = [];
    public $listaTipiAppuntamenti = [];

    public function mount($idClient, AppointmentService $appointmentService)
    {
        $this->client = $appointmentService->clientByIdWithAppointments($idClient);
        $this->client_id = $idClient;
        $this->user_id = Auth::id();
        $this->listaTipiAppuntamenti = $appointmentService->listaTipiAppuntamenti();
    }

    public function salvaAppuntamento(AppointmentService $appointmentService)
    {
        $this->evento['user_id'] = auth()->id();
        $this->evento['client_id'] = $this->client_id;
        $this->evento['appointment_type_id'] = $this->appointment_type_id;
        $this->evento['note'] = $this->note;
        $this->evento['start'] = $this->startDate.' '.$this->startTime;
        $appointmentService->crea($this->evento);

        session()->flash('appuntamento', 'appuntamento salvato con successo');
        $this->redirect(route('admin.clienti.appuntamenti', $this->client_id));
    }

    public function render()
    {
        return view('livewire.pages.appuntamenti.crea-appuntamento')->layout('layouts.app');
    }
}
