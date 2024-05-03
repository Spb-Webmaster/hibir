<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Info\InfoController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});

Route::controller(InfoController::class)->group(function () {

    Route::get('/'.config('links.link.news'), 'infos')
        ->name('infos');
    Route::get('/'.config('links.link.news').'/{slug}', 'info')
        ->name('info');
});
