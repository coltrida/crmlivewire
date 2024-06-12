<?php

use App\Http\Controllers\FrontController;
use App\Livewire\Admin\Audiometrie\AudiometriaPaziente;
use App\Livewire\Admin\clienti\Clienti;
use App\Livewire\Admin\clienti\InsertClient;
use App\Livewire\Admin\Clienti\RiepilogoClient;
use App\Livewire\Admin\magazzini\Magazzini;
use App\Livewire\Admin\Magazzini\RiepilogoMagazzini;
use App\Livewire\Admin\Prove\ProvaPaziente;
use App\Livewire\Admin\Prove\ProveFiliale;
use App\Livewire\Admin\Prove\RiepilogoProve;
use App\Livewire\Admin\Telefonate\TelefonatePaziente;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('inizio');
Route::post('/saveConfiguration', [FrontController::class, 'saveConfiguration'])->name('configuration.save');

/*Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');*/

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('dashboard', \App\Livewire\Admin\Home::class)->name('dashboard');

//----------------- magazzino ----------------//
Route::get('magazzino/riepilogo', RiepilogoMagazzini::class)->name('admin.magazzino.riepilogo');
Route::get('magazzino/{idShop}', Magazzini::class)->name('admin.magazzino');

//----------------- clienti--------------------//
Route::get('clienti/riepilogo', RiepilogoClient::class)->name('admin.clienti.riepilogo');
Route::get('clienti/{idShop}', Clienti::class)->name('admin.clienti');
Route::get('clienti/insert/{idShop}/{idClient?}', InsertClient::class)->name('admin.clienti.insert');

//----------------- prove --------------------//
Route::get('prove/riepilogo', RiepilogoProve::class)->name('admin.prove.riepilogo');
Route::get('clienti/prova/{idClient}', ProvaPaziente::class)->name('admin.clienti.prova');
Route::get('prove/{idShop}', ProveFiliale::class)->name('admin.prove.filiale');

//------------------ audiometrie -------------//
Route::get('clienti/audiometria/{idClient}/{idAudiometria?}', AudiometriaPaziente::class)->name('admin.clienti.audiometria');

//----------------- telefonate ---------------//
Route::get('clienti/telefonate/{idClient}', TelefonatePaziente::class)->name('admin.clienti.telefonate');

require __DIR__.'/auth.php';
