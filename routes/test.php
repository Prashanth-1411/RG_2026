<?php

use Illuminate\Support\Facades\Route;
use App\Models\EquipmentRental;

Route::get('/test-equipment-create', function () {
    try {
        $item = new EquipmentRental();
        $item->name = 'Route Test';
        $item->slug = 'route-test-' . time();
        $item->description = 'Created via route test';
        $item->price = 199.99;
        $item->features = 'Test features';
        $item->is_available = true;
        $item->sort_order = 0;
        $item->save();
        return 'OK - Created ID: ' . $item->id . ' at ' . now();
    } catch (Throwable $e) {
        return 'FAIL: ' . $e->getMessage();
    }
});
