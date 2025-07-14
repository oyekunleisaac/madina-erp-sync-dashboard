<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyncController;

Route::get('/erp/products', [SyncController::class, 'getErpProducts']);
Route::get('/madina/products', [SyncController::class, 'getMadinaProducts']);
Route::post('/sync/product/{id}', [SyncController::class, 'syncProduct']);
Route::post('/reset/madina', [SyncController::class, 'resetMadinaData']);
