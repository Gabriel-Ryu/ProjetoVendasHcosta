<?php
// use App\Http\Controllers\api\ProductsController;

Route::apiResource('products/', 'App\Http\Controllers\api\ProductsController');

// Route::get('products',[ProductsController::class, 'showProduct']);

// Route::get('productById',[ProductsController::class, 'showProductById']);