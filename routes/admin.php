<?php


use App\Livewire\Admin\Clienti\RiepilogoClient;
use App\Livewire\Admin\Magazzini\RiepilogoMagazzini;
use App\Livewire\Admin\Prove\RiepilogoProve;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', \App\Http\Middleware\VerifyIsAdmin::class])->group(function () {

//----------------- clienti--------------------//
Route::get('clientiRiepilogo', RiepilogoClient::class)->name('admin.clienti.riepilogo');

//----------------- magazzino ----------------//
Route::get('magazzinoRiepilogo', RiepilogoMagazzini::class)->name('admin.magazzino.riepilogo');

//----------------- prove --------------------//
Route::get('prove/riepilogo', RiepilogoProve::class)->name('admin.prove.riepilogo');

});


