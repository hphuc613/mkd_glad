<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('get.home.index');

Route::get('point-reward', 'HomeController@pointReward')->name('get.home.pointReward');

Route::get('about-us', 'PageController@getPage')->name('get.page.aboutUs');
Route::get('our-mission', 'PageController@getPage')->name('get.page.ourMission');
Route::get('shipping-information', 'PageController@getPage')->name('get.page.shippingInformation');
Route::get('common-problem', 'PageController@getPage')->name('get.page.commonProblem');
Route::get('contact-us', 'PageController@getPage')->name('get.page.contactUs');

Route::get('past-participating', 'PageController@participate')->name('get.page.participate');
