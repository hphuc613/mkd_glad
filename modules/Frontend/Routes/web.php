<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('get.home.index');

Route::get('login', 'HomeController@login')->name('get.home.login');
Route::post('login', 'HomeController@login')->name('post.home.login');

Route::get('forgot-password', 'HomeController@forgotPassword')->name('get.home.forgotPassword');
Route::post('forgot-password', 'HomeController@forgotPassword')->name('post.home.forgotPassword');

Route::get('point-reward', 'HomeController@pointReward')->name('get.home.pointReward');
