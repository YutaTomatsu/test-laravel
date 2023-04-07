<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;



Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/manage', [ContactController::class, 'manage']);
Route::get('/manage2', [ContactController::class, 'manage2']);
Route::get('/search', [ContactController::class, 'search']);
Route::delete('/contacts/{id}',[ContactController::class, 'destroy'] )->name('contact.destroy');



