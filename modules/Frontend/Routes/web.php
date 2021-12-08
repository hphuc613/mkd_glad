<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('get.home.index');

Route::get('login', 'HomeController@login')->name('get.home.login');
Route::post('login', 'HomeController@login')->name('post.home.login');

Route::get('forgot-password', 'HomeController@forgotPassword')->name('get.home.forgotPassword');
Route::post('forgot-password', 'HomeController@forgotPassword')->name('post.home.forgotPassword');

Route::get('point-reward', 'HomeController@pointReward')->name('get.home.pointReward');

Route::get('about-us', 'PageController@getPage')->name('get.page.aboutUs');
Route::get('our-mission', 'PageController@getPage')->name('get.page.ourMission');
Route::get('shipping-information', 'PageController@getPage')->name('get.page.shippingInformation');
Route::get('common-problem', 'PageController@getPage')->name('get.page.commonProblem');
Route::get('contact-us', 'PageController@getPage')->name('get.page.contactUs');
