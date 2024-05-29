<?php

namespace App\Services;

use App\Models\Supplier;

class SupplierService
{
    public function listaFornitori()
    {
        return Supplier::orderBy('name')->get();
    }

    public function listinoOfFornitoreById($idSupplier)
    {
        return Supplier::with('productLists')->find($idSupplier)->productLists;
    }
}
