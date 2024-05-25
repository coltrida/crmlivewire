<?php

use App\Http\Controllers\FrontController;
use App\Livewire\Admin\Clienti;
use App\Livewire\Admin\Magazzini;
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
Route::get('magazzino/{idShop}', Magazzini::class)->name('admin.magazzino');
Route::get('clienti/{idShop}', Clienti::class)->name('admin.clienti');

require __DIR__.'/auth.php';
