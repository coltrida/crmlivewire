<?php

namespace App\Livewire\Admin\magazzini;

use Livewire\Component;

class RiepilogoMagazzini extends Component
{
    public function render()
    {
        return view('livewire.admin.magazzini.riepilogo-magazzini')->layout('layouts.app');
    }
}
