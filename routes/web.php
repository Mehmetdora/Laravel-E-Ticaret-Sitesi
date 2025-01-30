<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnsignedPagesController;
use Illuminate\Support\Facades\Route;

Route::controller(UnsignedPagesController::class)->group(function(){

    Route::get('/','welcome')->name('welcome');

});


Route::controller(AuthController::class)->group(function(){

    Route::get('/logout','logout')->name('logout');

    Route::get('/login','login')->name('login');
    Route::get('/register','register')->name('register');

    Route::post('/logined','logined')->name('logined');
    Route::post('/registered','registered')->name('registered');

});
