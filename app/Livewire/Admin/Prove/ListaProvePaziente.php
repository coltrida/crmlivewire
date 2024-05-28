<?php

namespace App\Livewire\Admin\Prove;

use Livewire\Component;

class ListaProvePaziente extends Component
{
    public function render()
    {
        return view('livewire.admin.prove.lista-prove-paziente')->layout('layouts.app');
    }
}
