<?php

use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psr\Container\ContainerInterface;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(RegionController::class)->group(function () {
    Route::prefix('region')->name('region.')->group(function () {
        Route::post('/', 'onCreate')->name('create');
        Route::get('/', 'onListAll')->name('listall');
        Route::get('/{id}', 'onFind')->name('find');
    });
});

Route::controller(CityController::class)->group(function () {
    Route::prefix('city')->name('city.')->group(function () {
        Route::post('/','onCreate')->name('create');
    });
});
