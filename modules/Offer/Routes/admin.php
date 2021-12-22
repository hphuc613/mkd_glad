<?php

use Illuminate\Support\Facades\Route;

Route::prefix("offer")->group(function () {
    Route::get("/", "OfferController@index")->name("get.offer.list");
    Route::middleware('can:offer-create')->group(function () {
        Route::get("/create", "OfferController@getCreate")->name("get.offer.create");
        Route::post("/create", "OfferController@postCreate")->name("post.offer.create");
    });
    Route::middleware('can:offer-update')->group(function () {
        Route::get("/update/{id}", "OfferController@getUpdate")->name("get.offer.update");
        Route::post("/update/{id}", "OfferController@postUpdate")->name("post.offer.update");
    });
    Route::get("/delete/{id}", "OfferController@delete")->name("get.offer.delete")->middleware('can:offer-delete');
});
