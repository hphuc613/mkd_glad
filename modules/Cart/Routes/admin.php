<?php
use Illuminate\Support\Facades\Route;

Route::prefix("cart")->group(function (){
    Route::get("/", "CartController@index")->name("get.cart.list");
});
