<?php

namespace App\Livewire\User;

use App\Services\ConfigurationService;
use App\Services\TrialService;
use Carbon\Carbon;
use Livewire\Component;

class HomeProve extends Component
{
    public function render(TrialService $trialService, ConfigurationService $configurationService)
    {
        return view('livewire.user.home-prove', [
            'proveInCorso' => $trialService->listeProveInCorsoByIdUser(auth()->id()),
            'proveFinalizzateNelMese' => $trialService->listeProveFinalizzateNelMese(auth()->id()),
            'secondaryColor' => $configurationService->getSecondaryColor()
        ]);
    }
}
