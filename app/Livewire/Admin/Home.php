<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        if (auth()->user()->isAdmin()){
            return view('livewire.admin.home')->layout('layouts.app');
        }
        elseif (auth()->user()->isAudio()){
            return view('livewire.user.home')->layout('layouts.app');
        }
    }
}
