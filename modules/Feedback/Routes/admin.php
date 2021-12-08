<?php

use Illuminate\Support\Facades\Route;

Route::prefix("feedback")->group(function () {
    Route::get("/", "FeedbackController@index")->name("get.feedback.list");
    Route::get("detail/{id}", "FeedbackController@detail")->name("get.feedback.detail");
});
