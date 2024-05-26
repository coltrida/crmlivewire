<?php

namespace App\Livewire\Admin;

use App\Services\CodeClientService;
use Livewire\Component;

class InsertClient extends Component
{
    public $shopId;
    public $codeClient;

    public function mount($idShop, CodeClientService $codeClientService)
    {
        $this->shopId = $idShop;
        $this->codeClient = $codeClientService->list();
    }

    public function render()
    {
        return view('livewire.admin.insert-client')->layout('layouts.app');
    }
}
