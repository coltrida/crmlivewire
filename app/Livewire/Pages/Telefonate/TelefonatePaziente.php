<?php

namespace App\Livewire\Pages\Telefonate;

use App\Services\AppointmentService;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class TelefonatePaziente extends Component
{
    public int $idClient;
    public $startDate;
    public $startTime;
    public int $appointment_type_id;
    public string|null $note = null;
    public $listaTipiAppuntamenti = [];
    public $evento = [];

    public function mount($idClient, AppointmentService $appointmentService)
    {
        $this->idClient = $idClient;
        $this->listaTipiAppuntamenti = $appointmentService->listaTipiAppuntamenti();

        if (session('appuntamento')){
            Alert::success('Ottimo', session('appuntamento'));
        }

        if (session('phone')){
            if (session('phone') != 'appuntamento'){
                Alert::success('Ottimo', 'Telefonata salavata correttamente');
            }
        }
    }

    public function salvaAppuntamento(AppointmentService $appointmentService)
    {
        $this->evento['user_id'] = auth()->id();
        $this->evento['client_id'] = $this->idClient;
        $this->evento['appointment_type_id'] = $this->appointment_type_id;
        $this->evento['note'] = $this->note;
        $this->evento['start'] = $this->startDate.' '.$this->startTime;
        $appointmentService->crea($this->evento);

        session()->flash('appuntamento', 'appuntamento salvato con successo');
        $this->redirect(route('admin.clienti.telefonate', $this->idClient));
    }

    public function render()
    {
        return view('livewire.pages.telefonate.telefonate-paziente')->layout('layouts.app');
    }
}
