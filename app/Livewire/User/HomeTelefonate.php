<?php

namespace App\Livewire\User;

use App\Services\PhoneService;
use Livewire\Component;

class HomeTelefonate extends Component
{
    public function render(PhoneService $phoneService)
    {
        return view('livewire.user.home-telefonate', [
            'listaTelefonataDaFareOggi' => $phoneService->listaTelefonataDaFareOggi()
        ]);
    }
}
