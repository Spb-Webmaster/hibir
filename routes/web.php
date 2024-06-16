<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Catalog\CatalogController;
use App\Http\Controllers\Catalog\ObjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Info\InfoController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Video\VideoController;
use Illuminate\Support\Facades\Route;

/**
 * страницы
 */
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
Route::controller(VideoController::class)->group(function () {

    Route::get('/'.config('links.link.video'), 'videos')
        ->name('videos');
    Route::get('/'.config('links.link.video').'/{slug}', 'video')
        ->name('video');
});

/**
 * страницы
 */
/**
 * каталог
 */
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

    Route::post('/search.top-search', 'topSearch')
        ->name('form.search.top_search');

    /** //search */

});

Route::controller(ObjectController::class)->group(function () {
    Route::get('/r-{religion_slug}/{object_slug}', 'pageObjectHome')
        ->name('page.object');

    Route::get('/r-{religion_slug}/{object_slug}/gallery', 'pageObjectGallery')
        ->name('page.object.gallery');

    Route::get('/r-{religion_slug}/{object_slug}/faq', 'pageObjectFaq')
        ->name('page.object.faq');
    Route::get('/r-{religion_slug}/{object_slug}/info', 'pageObjectInfo')
        ->name('page.object.info');
    Route::get('/r-{religion_slug}/{object_slug}/video', 'pageObjectVideo')
        ->name('page.object.video');
    Route::get('/r-{religion_slug}/{object_slug}/contacts', 'pageObjectContact')
        ->name('page.object.contact');

    Route::get('/r-{religion_slug}/{object_slug}/news', 'pageObjectNewCategory')
        ->name('page.object.new_category');
    Route::get('/r-{religion_slug}/{object_slug}/news/{new_slug}', 'pageObjectNew')
        ->name('page.object.new');


});

Route::controller(AjaxController::class)->group(function () {
    /* подставка в input в поиске */
    Route::post('/search/big_autocomplete', 'bigAutocomplete');
    Route::post('/search/top_autocomplete', 'topAutocomplete');

});
/**
 * каталог
 */
/**
 * страницы
 */

Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});
/**
 * страницы
 */


