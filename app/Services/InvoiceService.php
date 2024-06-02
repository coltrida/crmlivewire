<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Trial;

class InvoiceService
{
    public function creaFattura($idTrial)
    {
        return Invoice::create([
            'trial_id' => $idTrial
        ]);
    }

    public function inserisciPagamento($idInvoice, $acconto, $name)
    {
        Payment::create([
            'name' => $name,
            'importo' => $acconto,
            'invoice_id' => $idInvoice
        ]);
    }

    public function listaPagamenti($idTrial)
    {
        return Trial::with(['invoice' => function($i){
            $i->with('payments');
        }])->find($idTrial)->invoice->payments;
    }
}
