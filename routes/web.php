<?php

use App\Http\Controllers\{PagesController, ContactMessageController};
use App\Http\Livewire\{Messages,Settings};
use Illuminate\Support\Facades\Route;

Route::middleware(['HtmlMinifier'])->group(function(){
    
    Route::get('/', [PagesController::class,'index'])->name('welcome');
    Route::post('contact', [ContactMessageController::class,'store'])->name('contact');
});



Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function(){
    
    Route::get('/', [PagesController::class,'dashboard'])->name('dashboard');

    Route::get('site-settings',Settings::class)->name('site-settings');
    Route::get('messages', Messages::class)->name('messages');

});


/**
 * Last Route To Handle 404
 */

 Route::any('{any}', [PagesController::class, 'notFound']);