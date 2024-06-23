<?php

use App\Http\Controllers\FrontController;
use App\Livewire\Admin\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\clienti\Clienti;
use App\Livewire\Pages\clienti\InsertClient;
use App\Livewire\Pages\Prove\ProvaPaziente;
use App\Livewire\Pages\Prove\ProveFiliale;
use App\Livewire\Pages\Audiometrie\AudiometriaPaziente;
use App\Livewire\Pages\Appuntamenti\Agenda;
use App\Livewire\Pages\Telefonate\TelefonatePaziente;
use App\Livewire\Pages\magazzini\Magazzini;

Route::get('/', [FrontController::class, 'index'])->name('inizio');
Route::post('/saveConfiguration', [FrontController::class, 'saveConfiguration'])->name('configuration.save');

/*Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');*/

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('dashboard', Home::class)->name('dashboard');

Route::middleware('auth')->group(function () {

    //----------------- magazzino ----------------//
    Route::get('magazzino/{idShop}', Magazzini::class)->name('admin.magazzino');

    //----------------- prove --------------------//
    Route::get('clienti/prova/{idClient}', ProvaPaziente::class)->name('clienti.prova');
    Route::get('prove/{idShop}', ProveFiliale::class)->name('prove.filiale');

    //------------------ audiometrie -------------//
    Route::get('clienti/audiometria/{idClient}/{idAudiometria?}', AudiometriaPaziente::class)->name('clienti.audiometria');

    //----------------- appuntamenti ---------------//
    Route::get('clienti/appuntamenti/{idClient}', Agenda::class)->name('clienti.appuntamenti');

    //----------------- telefonate ---------------//
    Route::get('clienti/telefonate/{idClient}', TelefonatePaziente::class)->name('clienti.telefonate');

    //----------------- clienti--------------------//
    Route::get('clienti/{idShop}/{idClient?}', Clienti::class)->name('clienti');
    Route::get('clienti/insert/{idShop}/{idClient?}', InsertClient::class)->name('clienti.insert');

});

require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
