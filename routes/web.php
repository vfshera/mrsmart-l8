<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['HtmlMinifier'])->group(function () {

    //'lscache:max-age=604800;public'

    Route::get('/', [PagesController::class, 'index'])->name('welcome');

});

Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {

    //'lscache:no-cache'

    Route::get('/', [PagesController::class, 'dashboard'])->name('dashboard');

    Route::get('site-settings', [PagesController::class, 'settings'])->name('site-settings');
    Route::get('messages', [PagesController::class, 'messages'])->name('messages');
    // Route::get('messages', Messages::class)->name('messages');

});

/**
 * Last Route To Handle 404
 */

Route::any('{any}', [PagesController::class, 'notFound']);