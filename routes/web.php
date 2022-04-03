<?php

use App\Http\Controllers\PagesController;
use App\Http\Livewire\Messages;
use App\Http\Livewire\Settings;
use Illuminate\Support\Facades\Route;

Route::middleware(['HtmlMinifier', 'lscache:max-age=604800;public'])->group(function () {

    Route::get('/', [PagesController::class, 'index'])->name('welcome');

});

Route::middleware(['auth:sanctum', 'verified', 'lscache:no-cache'])->prefix('dashboard')->group(function () {

    Route::get('/', [PagesController::class, 'dashboard'])->name('dashboard');

    Route::get('site-settings', Settings::class)->name('site-settings');
    Route::get('messages', Messages::class)->name('messages');

});

/**
 * Last Route To Handle 404
 */

Route::any('{any}', [PagesController::class, 'notFound']);