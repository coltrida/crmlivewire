<?php

namespace App\Livewire\Admin\Telefonate;

use Livewire\Component;

class TelefonatePaziente extends Component
{
    public int $idClient;

    public function mount($idClient)
    {
        $this->idClient = $idClient;
    }

    public function render()
    {
        return view('livewire.admin.telefonate.telefonate-paziente')->layout('layouts.app');
    }
}
