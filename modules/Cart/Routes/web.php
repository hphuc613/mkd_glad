<?php
use Illuminate\Support\Facades\Route;

Route::prefix('cart')->group(function (){
    Route::get('box', 'CartController@cartBox')->name('get.cart.cartBox');
});
