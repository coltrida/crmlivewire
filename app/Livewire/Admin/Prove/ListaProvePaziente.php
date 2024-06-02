<?php

namespace App\Livewire\Admin\Prove;

use App\Models\Trial;
use App\Services\InvoiceService;
use App\Services\ProductService;
use App\Services\TrialService;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class ListaProvePaziente extends Component
{
    public int $idClient;
    public int $showProducts = 0;
    public int $creaFattura = 0;
    public $acconto = null;
    public Trial $dettagliProva;
    public $pagamenti = [];
    public $showNuovoPagamento = 0;
    public $rimanenzaAlSaldo = 0;
    public $importoPagamento;

    public function mount($idClient)
    {
        $this->idClient = $idClient;
    }

    public function reso($idProva, TrialService $trialService, ProductService $productService)
    {
        $idStatoProvaReso = $trialService->idTrialStateByName('Reso');
        $idStatoProdottoInMagazzino = $productService->idProductStateByName('MAGAZZINO');
        $trialService->reso($idProva, $idStatoProvaReso, $idStatoProdottoInMagazzino);
    }

    public function positivo($idProva, TrialService $trialService, ProductService $productService)
    {
        $idStatoPositivo = $trialService->idTrialStateByName('Positiva');
        $idStatoProdottoVenduto = $productService->idProductStateByName('VENDUTO');
        $trialService->provaPositiva($idProva, $idStatoPositivo, $idStatoProdottoVenduto);
        $this->dettagliProva = $trialService->provaConProdotti($idProva);
        $this->creaFattura = 1;
    }

    public function info($idProva, TrialService $trialService, InvoiceService $invoiceService)
    {
        $this->dettagliProva = $trialService->provaConProdotti($idProva);
        if ($this->dettagliProva->trialState->name == 'Positiva'){
            $this->pagamenti = $invoiceService->listaPagamenti($idProva);
            $this->rimanenzaAlSaldo = $this->dettagliProva->importoTot - $this->pagamenti->sum('importo');
        }
        $this->showProducts = 1;
    }

    public function creazioneFattura(InvoiceService $invoiceService)
    {
        $invoice = $invoiceService->creaFattura($this->dettagliProva->id);
        if ($this->acconto){
            $invoiceService->inserisciPagamento($invoice->id, $this->acconto, 'acconto');
        }
        $this->chiudiModal();
    }

    public function chiudiModal()
    {
        $this->showProducts = 0;
        $this->creaFattura = 0;
        $this->reset('dettagliProva');
    }

    public function aggiungiPagamento()
    {
        $this->showNuovoPagamento = 1;
    }

    public function salvaPagamento(InvoiceService $invoiceService)
    {
        $invoiceService->inserisciPagamento($this->dettagliProva->invoice->id, $this->importoPagamento, 'rata');
        $this->pagamenti = $invoiceService->listaPagamenti($this->dettagliProva->id);
        $this->rimanenzaAlSaldo = $this->dettagliProva->importoTot - $this->pagamenti->sum('importo');
        $this->showNuovoPagamento = 0;
    }

    public function render(TrialService $trialService)
    {
        return view('livewire.admin.prove.lista-prove-paziente', [
            'prove' => $trialService->listaProveTranneInProgress($this->idClient)
        ])->layout('layouts.app');
    }
}
