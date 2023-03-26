<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use BigCommerceIntegrations\Categories\Services\BCCategoryService;

Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
    Route::group([ 'prefix' => 'v1' ], function () {
        Route::get('category/export', [BCCategoryService::class, 'exportAsJson']);
    });
});
