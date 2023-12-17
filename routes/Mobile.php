<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\Mobile\Car\Brand\BrandController;
use App\Http\Controllers\API\V1\Mobile\Car\Series\SeriesController;
use App\Http\Controllers\API\V1\Mobile\Car\Model\ModelController;
use App\Http\Controllers\API\V1\Mobile\Car\UserCars\UserCarsController;

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('cars')->group(function () {
        //get all Brands
        Route::get('brand', [BrandController::class, 'index']);

        //get Brand Series by id
        Route::get('brand/{id}/series', [SeriesController::class, 'getBrandSeries']);

        //get Series Models by id
        Route::get('series/{id}/models', [ModelController::class, 'getSeriesModels']);

        //get My Cars
        Route::resource('my-cars', UserCarsController::class);


    });

});
