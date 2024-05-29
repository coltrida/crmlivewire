<?php

namespace App\Livewire\Admin\Prove;

use App\Models\Client;
use App\Services\ClientService;
use App\Services\ProductService;
use App\Services\SupplierService;
use Livewire\Component;

class CreaProva extends Component
{

    public int $supplierId = 0;
    public int $listinoId = 0;
    public int $productId;
    public Client $client;

    public function mount($idClient, ClientService $clientService)
    {
        $this->client = $clientService->clientById($idClient);
    }

    public function creaProva()
    {

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
