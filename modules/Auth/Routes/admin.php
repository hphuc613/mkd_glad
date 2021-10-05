<?php

use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function () {
    Route::get("login", "AuthController@getLogin")->name("admin.get.login");
    Route::post("login", "AuthController@postLogin")->name("admin.post.login");
    Route::get("logout", "AuthController@getLogout")->name("admin.get.logout");
    Route::get("forgot-password", "AuthController@getForgotPassword")->name("admin.get.forgot_password");
});
