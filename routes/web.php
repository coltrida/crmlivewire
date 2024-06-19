<?php

use App\Http\Controllers\FrontController;
use App\Livewire\Admin\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('inizio');
Route::post('/saveConfiguration', [FrontController::class, 'saveConfiguration'])->name('configuration.save');

/*Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');*/

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('dashboard', Home::class)->name('dashboard');

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
require __DIR__.'/auth.php';
