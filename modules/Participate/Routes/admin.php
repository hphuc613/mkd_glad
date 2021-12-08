<?php
use Illuminate\Support\Facades\Route;

Route::prefix("participate")->group(function (){
    Route::get("/", "ParticipateController@index")->name("get.participate.list");
    Route::group(['middleware' => 'can:participate-create'], function () {
        Route::get('create', 'ParticipateController@getCreate')->name('get.participate.create');
        Route::post('create', 'ParticipateController@postCreate')->name('post.participate.create');
    });
    Route::group(['middleware' => 'can:participate-update'], function () {
        Route::get('/update/{id}', 'ParticipateController@getUpdate')->name('get.participate.update');
        Route::post('/update/{id}', 'ParticipateController@postUpdate')->name('post.participate.update');
    });
    Route::get('/delete/{id}', 'ParticipateController@delete')->name('get.participate.delete')->middleware('can:participate-delete');
});
