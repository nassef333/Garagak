<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Mobile\Car\Brand\BrandController;
use App\Http\Controllers\API\V1\Mobile\Car\Series\SeriesController;
use App\Http\Controllers\API\V1\Mobile\Car\Model\ModelController;


Route::prefix('admin')->as('admin.')->middleware('auth:sanctum')->group(function () {

    Route::prefix('cars')->group(function () {
        //Brand Resource
        Route::resource('brand', BrandController::class);

        //Series Resource
        Route::resource('series', SeriesController::class);
        Route::get('brand/{id}/series', [SeriesController::class, 'getBrandSeries']);

        //Model Resource
        Route::resource('model', ModelController::class);
        Route::get('series/{id}/models', [ModelController::class, 'getSeriesModels']);
    });

});
