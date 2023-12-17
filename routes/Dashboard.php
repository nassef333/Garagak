<?php

use Illuminate\Support\Facades\Route;


Route::prefix('admin')->as('admin.')->middleware('auth:sanctum')->group(function () {

});
