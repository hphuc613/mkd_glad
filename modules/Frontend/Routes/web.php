<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('get.home.index');

Route::get('point-reward', 'HomeController@pointReward')->name('get.home.pointReward');

Route::get('about-us', 'PageController@getPage')->name('get.page.aboutUs');
Route::get('our-mission', 'PageController@getPage')->name('get.page.ourMission');
Route::get('shipping-information', 'PageController@getPage')->name('get.page.shippingInformation');
Route::get('common-problem', 'PageController@getPage')->name('get.page.commonProblem');
Route::get('contact-us', 'PageController@getPage')->name('get.page.contactUs');
Route::get('order-teaching', 'PageController@getPage')->name('get.page.orderTeaching');

Route::get('past-participating', 'PageController@participate')->name('get.page.participate');

Route::prefix('product')->group(function () {
    Route::get('', 'ProductController@productListing')->name('get.product.productListing');
    Route::get('detail/{slug}', 'ProductController@productDetail')->name('get.product.productDetail');
    Route::get('feedback/{slug}', 'ProductController@feedback')->name('get.product.feedback');
    Route::post('feedback/{slug}', 'ProductController@feedback')->name('post.product.feedback');
});

Route::prefix('post')->group(function () {
    Route::get('', 'PostController@index')->name('get.post.postListing');
    Route::get('detail/{id}-{slug}', 'PostController@detail')->name('get.post.postDetail');
});

Route::prefix('cart')->group(function () {
    Route::get('box', 'CartController@cartBox')->name('get.cart.cartBox');
    Route::get('add', 'CartController@addToCart')->name('get.cart.addToCart');
});
