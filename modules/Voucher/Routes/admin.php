<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::prefix("voucher")->group(function () {
        Route::get("/", "VoucherController@index")->name("get.voucher.list");
        Route::get("/", "VoucherController@index")->name("get.voucher.list");
        Route::get("create", "VoucherController@getCreate")->name("get.voucher.create");
        Route::post("create", "VoucherController@postCreate")->name("post.voucher.create");
        Route::get("update/{id}", "VoucherController@getUpdate")->name("get.voucher.update");
        Route::post("update/{id}", "VoucherController@postUpdate")->name("post.voucher.update");
        Route::get("delete/{id}", "VoucherController@delete")->name("get.voucher.delete");
    });
});
