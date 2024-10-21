<?php

use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\MunicipalityController;
use App\Http\Controllers\Api\V1\NeighbourhoodController;
use App\Http\Controllers\Api\V1\RegionController;
use App\Http\Controllers\Api\V1\SectorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psr\Container\ContainerInterface;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(RegionController::class)->group(function () {
    Route::prefix('region')->name('region.')->group(function () {
        Route::post('/', 'store')->name('store');
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });
});

Route::controller(CityController::class)->group(function () {
    Route::prefix('city')->name('city.')->group(function () {
        Route::post('/','store')->name('store');
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });
});

Route::controller(MunicipalityController::class)->group(function(){
    Route::prefix('municipality')->name('municipality.')->group(function() {
        Route::post('/','store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/', 'index')->name('index');
    });
});

Route::controller(NeighbourhoodController::class)->group(function () {
    Route::prefix('neighbourhood')->name('neighbourhood.')->group(function () {
        Route::post('/','store')->name('store');
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });
});

Route::controller(SectorController::class)->group(function () {
    Route::prefix('sector')->name('sector.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/by-municipality/{municipality_id}', 'listByMunicpality')->name('sector.by.municpality');
    });
});
Route::controller(AddressController::class)->group(function(){
    Route::prefix('v1/address')->name('address.')->group(function () {
        Route::post('/', 'store')->name('store');
    });
});
