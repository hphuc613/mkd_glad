<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::prefix("product-category")->group(function () {
        Route::get("/", "ProductCategoryController@index")->name("get.product_category.list")->middleware('can:product-category');
        Route::middleware('can:product-category-create')->group(function () {
            Route::get("/create", "ProductCategoryController@getCreate")->name("get.product_category.create");
            Route::post("/create", "ProductCategoryController@postCreate")->name("post.product_category.create");
        });
        Route::middleware('can:product-category-update')->group(function () {
            Route::get("/update/{id}", "ProductCategoryController@getUpdate")->name("get.product_category.update");
            Route::post("/update/{id}", "ProductCategoryController@postUpdate")->name("post.product_category.update");
        });
        Route::get("/delete/{id}", "ProductCategoryController@delete")->name("get.product_category.delete")->middleware('can:product-category-delete');
    });
});
