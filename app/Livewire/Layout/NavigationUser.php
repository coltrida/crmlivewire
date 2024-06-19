<?php

namespace App\Livewire\Layout;

use App\Models\Configuration;
use App\Livewire\Actions\Logout;
use App\Services\UsersService;
use Livewire\Component;

class NavigationUser extends Component
{
    public $primaryColor;
    public $mieFiliali;

    public function mount(UsersService $usersService)
    {
        $this->primaryColor = Configuration::first()?->primaryColor;
        $this->mieFiliali = $usersService->mieFiliali();
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
        return view('livewire.layout.navigation-user');
    }
}
