<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Mock API routes (since we don’t have api.php)
// Route::get('/api/erp/products', [SyncController::class, 'getErpProducts']);
// Route::get('/api/madina/products', [SyncController::class, 'getMadinaProducts']);
// Route::post('/api/sync/product/{id}', [SyncController::class, 'syncProduct']);
