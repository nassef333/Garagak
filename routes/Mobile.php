<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::resource('brand', \App\Http\Controllers\API\V1\Mobile\Car\Brand\BrandController::class);

});
