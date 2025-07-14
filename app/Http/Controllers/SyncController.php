<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    public function getErpProducts()
{
    $path = storage_path('app/erp_products.json');

    if (!file_exists($path)) {
        return response()->json(['error' => 'File not found', 'path' => $path]);
    }

    $json = file_get_contents($path);
    $data = json_decode($json, true);

    return response()->json($data);
}


   public function getMadinaProducts()
{
    $path = storage_path('app/madina_products.json');

    if (!file_exists($path)) {
        return response()->json([], 200);
    }

    $data = json_decode(file_get_contents($path), true);
    return response()->json($data);
}


   public function syncProduct($id)
{
    $erpPath = storage_path('app/erp_products.json');
    $madinaPath = storage_path('app/madina_products.json');

    $erpProducts = json_decode(file_get_contents($erpPath), true);
    $madinaProducts = json_decode(file_get_contents($madinaPath), true);

    $erpProduct = collect($erpProducts)->firstWhere('id', $id);

    if (!$erpProduct) {
        return response()->json(['error' => 'ERP product not found.'], 404);
    }

    // Replace or add the ERP product in the Madina products list
    $madinaProducts = collect($madinaProducts)
        ->reject(fn($p) => $p['id'] == $id)
        ->push($erpProduct)
        ->values()
        ->all();

    file_put_contents($madinaPath, json_encode($madinaProducts, JSON_PRETTY_PRINT));

    return response()->json(['message' => 'Product synced successfully.']);
}


}
