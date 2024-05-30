<?php

namespace App\Livewire\Admin\Prove;

use App\Models\Client;
use App\Models\Trial;
use App\Services\ClientService;
use App\Services\ProductService;
use App\Services\SupplierService;
use App\Services\TrialService;
use Livewire\Component;

class CreaProva extends Component
{

    public int $supplierId = 0;
    public int $listinoId = 0;
    public int $productId;
    public Client $client;
    public Trial $trialUnderConstruction;

    public function mount($idClient, ClientService $clientService)
    {
        $this->client = $clientService->clientByIdWithTrialUnderConstruction($idClient);
        //dd($this->client);
        if ($this->client->trialsUnderConstructions->count() > 0){
            $this->trialUnderConstruction = $this->client->trialsUnderConstructions->first();
        }

        //dd($this->trialUnderConstruction);
    }

    public function creaOrUpdateProva(TrialService $trialService, ProductService $productService)
    {
        if ($this->client->trialsUnderConstructions->count() == 0){
            $idStateTrialUnderConstruction = $trialService->idTrialStateByName('Under Construction');
            $this->trialUnderConstruction = Trial::create([
                'client_id' => $this->client->id,
                'canal_id' => $this->client->canal_id,
                'trial_state_id' => $idStateTrialUnderConstruction
            ]);
        }
        $idStateApaInTrial = $productService->idProductStateByName('IN PROVA');
        $trialService->insertProductInTrial($this->productId, $this->trialUnderConstruction->id, $idStateApaInTrial);
        $this->trialUnderConstruction->load(['products' => function($p){
            $p->with('productList');
        }]);
       // dd($this->trialUnderConstruction);
        $this->reset('supplierId', 'listinoId', 'productId');
    }

    public function render(SupplierService $supplierService, ProductService $productService)
    {
        $idStateApaInFiliale = $productService->idProductStateByName('MAGAZZINO');

        return view('livewire.admin.prove.crea-prova', [
            'suppliers' => $supplierService->listaFornitori(),
            'listinoProdotti' => $this->supplierId ? $supplierService->listinoOfFornitoreById($this->supplierId) : [],
            'prodottiOfListinoInFilialeById' => $this->listinoId ?
                $productService->prodottiOfListinoInFilialeById($this->client->shop_id, $this->listinoId, $idStateApaInFiliale) : [],
        ])->layout('layouts.app');
    }
}
