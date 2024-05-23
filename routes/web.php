<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Catalog\CatalogController;
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

Route::controller(CatalogController::class)->group(function () {

    Route::get('/r-{slug}', 'religion')
        ->name('religion');

    Route::post('/form.submit.religion', 'religionSubmit')
        ->name('form.submit.religion');

    Route::post('/form.submit.religion_category', 'religion_categorySubmit')
        ->name('form.submit.religion_category');

    Route::post('/form.submit.area', 'areaSubmit')
        ->name('form.submit.area');

    Route::get('/r-{slug}/area-{id}', 'religionAreaListObjects')
        ->name('religion.area.list');

    Route::get('/r-{religion_slug}/area-{area_id}/{religion_gategory_slug}', 'religionAreaListCategoryObjects')
        ->name('religion.area.category.list');
    /** search */
    Route::post('/search.big-search', 'bigSearch')
        ->name('form.search.big_search');

    /** //search */

});



Route::controller(AjaxController::class)->group(function () {
    /* подставка в input в поиске */
    Route::post('/serch/autocomplete', 'autocomplete');

});


