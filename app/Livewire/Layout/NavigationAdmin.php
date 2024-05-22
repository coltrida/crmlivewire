<?php

namespace App\Livewire\Layout;

use App\Models\Configuration;
use Livewire\Component;
use App\Livewire\Actions\Logout;

class NavigationAdmin extends Component
{
    public $primaryColor;

    public function mount()
    {
        $this->primaryColor = Configuration::first()?->primaryColor;
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.layout.navigation-admin');
    }
}
