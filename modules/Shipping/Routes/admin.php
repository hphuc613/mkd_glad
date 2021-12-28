<?php
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::prefix("shipping")->group(function (){
        Route::get("/", "ShippingController@index")->name("get.shipping.list");
        Route::get("create", "ShippingController@getCreate")->name("get.shipping.create");
        Route::post("create", "ShippingController@postCreate")->name("post.shipping.create");
        Route::get("update/{id}", "ShippingController@getUpdate")->name("get.shipping.update");
        Route::post("update/{id}", "ShippingController@postUpdate")->name("post.shipping.update");
        Route::get("delete/{id}", "ShippingController@delete")->name("get.shipping.delete");
    });
});
