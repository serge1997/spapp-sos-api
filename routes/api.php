<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psr\Container\ContainerInterface;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/teste', function(Request $request, ContainerInterface $container) {
    $complain = $container->get('ComplainCreate');
    $value = $complain->create();
    return "Api is worked {$value}";
});
