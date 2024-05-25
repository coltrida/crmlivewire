<?php

namespace App\Livewire\Layout;

use App\Models\Configuration;
use App\Models\Shop;
use Livewire\Component;
use App\Livewire\Actions\Logout;

class NavigationAdmin extends Component
{
    public $primaryColor;
    public $filiali;

    public function mount()
    {
        $this->primaryColor = Configuration::first()?->primaryColor;
        $this->filiali = Shop::all();
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
