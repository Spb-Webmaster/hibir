<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Catalog\CatalogController;
use App\Http\Controllers\Catalog\ObjectController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserPhoto\UserPhotoAjaxController;
use App\Http\Controllers\Dashboard\UserPhoto\UserPhotoController;
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


/**
 * Auth
 */

Route::controller(SignInController::class)->group(function () {

    Route::get('/login', 'page')
        ->middleware('guest')
        ->name('login');
    Route::post('/login', 'handle')

        ->name('login.handle');

});

Route::controller(SignUpController::class)->group(function () {

    Route::get('/sign-up', 'page')
        ->middleware('guest')
        ->name('register');
    Route::post('/sign-up', 'handle')

        ->name('register.handle');

});

Route::controller(ForgotPasswordController::class)->group(function () {

    Route::get('/forgot-password', 'page')
        ->middleware('guest')
        ->name('forgot');

    Route::post('/forgot-password', 'handle')
        ->middleware('guest')
        ->name('forgot.handel');

});

Route::controller(ResetPasswordController::class)->group(function () {

    Route::get('/reset-password/{token}','page')
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', 'handle')
        ->middleware('guest')
        ->name('password.handle');

});

Route::controller(LogoutController::class)->group(function () {

    Route::post('/logout', 'page')->name('logout');

});

Route::controller(DashboardController::class)->group(function () {

    Route::get('/cabinet', 'page')
        ->middleware('auth.published')
        ->name('cabinet');


    Route::get('/cabinet-blocked', 'blocked')
        ->middleware('auth.blocked')
        ->name('blocked');


    Route::post('/cabinet/setting.handel', 'settingHandel')
        ->middleware('auth.published')
        ->name('setting.handel');

    Route::post('/cabinet/setting-password.handel', 'settingPasswordHandel')
        ->middleware('auth.published')
        ->name('setting.password.handel');

});

Route::controller(UserPhotoController::class)->group(function () {

    Route::get('/cabinet/photos/{id}', 'page')
        ->middleware('auth.published')
        ->name('cabinet.photos');

    Route::post('/cabinet/photos/{id}/upload', 'upload')
        ->middleware('auth.published')
        ->name('cabinet.photos.upload');

});
Route::controller(UserPhotoAjaxController::class)->group(function () {

    /* удаление фото - кабинет user */
    Route::post('/cabinet/photo-delete', 'deletePhoto')
        ->middleware('auth.published');


});

/**
 *  Auth
 */




Route::controller(InfoController::class)->group(function () {

    Route::get('/' . config('links.link.news'), 'infos')
        ->name('infos');
    Route::get('/' . config('links.link.news') . '/{slug}', 'info')
        ->name('info');
});
Route::controller(VideoController::class)->group(function () {

    Route::get('/' . config('links.link.video'), 'videos')
        ->name('videos');
    Route::get('/' . config('links.link.video') . '/{slug}', 'video')
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

    Route::post('/search/big-search', 'bigSearch')
        ->name('form.search.big_search');

    Route::post('/search/top-search', 'topSearch')
        ->name('form.search.top_search');

    /** //search */

});

Route::controller(ObjectController::class)->group(function () {

    /**  о нас  */
    Route::get('/r-{religion_slug}/{object_slug}/about', 'pageObjectAbout')
        ->name('page.object.about');

    Route::get('/r-{religion_slug}/{object_slug}/about/{slug}', 'pageObjectAboutPage')
        ->name('page.object.about.page');

    /**  деятельность  */
    Route::get('/r-{religion_slug}/{object_slug}/activity', 'pageObjectActivity')
        ->name('page.object.activity');

    Route::get('/r-{religion_slug}/{object_slug}/activity/{slug}', 'pageObjectActivityPage')
        ->name('page.object.activity.page');

    /**  обряды  */
    Route::get('/r-{religion_slug}/{object_slug}/ritual', 'pageObjectRitual')
        ->name('page.object.ritual');

    Route::get('/r-{religion_slug}/{object_slug}/ritual/{slug}', 'pageObjectRitualPage')
        ->name('page.object.ritual.page');


    /*
        Route::get('/r-{religion_slug}/{object_slug}/gallery', 'pageObjectGallery')
            ->name('page.object.gallery');  // удалил */


    Route::get('/r-{religion_slug}/{object_slug}/media/{slug}', 'pageObjectMedia')
        ->name('page.object.media');

    Route::get('/r-{religion_slug}/{object_slug}/faq', 'pageObjectFaq')
        ->name('page.object.faq');

    Route::get('/r-{religion_slug}/{object_slug}/info', 'pageObjectInfo')
        ->name('page.object.info');

    Route::get('/r-{religion_slug}/{object_slug}/info/{slug}', 'pageObjectInfoPage')
        ->name('page.object.info.page');
    /*
        Route::get('/r-{religion_slug}/{object_slug}/video', 'pageObjectVideo')
            ->name('page.object.video'); // удалил */


    Route::get('/r-{religion_slug}/{object_slug}/contacts', 'pageObjectContact')
        ->name('page.object.contact');

    Route::get('/r-{religion_slug}/{object_slug}/news', 'pageObjectNewCategory')
        ->name('page.object.new_category');
    Route::get('/r-{religion_slug}/{object_slug}/news/{new_slug}', 'pageObjectNew')
        ->name('page.object.new');
    Route::get('/r-{religion_slug}/{object_slug}/page/{page_slug}', 'pageObjectPage')
        ->name('page.object.page');


});

Route::controller(AjaxController::class)->group(function () {
    /* подставка в input в поиске */
    Route::post('/search/big_autocomplete', 'bigAutocomplete');
    Route::post('/search/top_autocomplete', 'topAutocomplete');
    /* загрузка аватара*/
    Route::post('/cabinet/upload-avatar', 'uploadAvatar')->name('uploadAvatar');

});
/**
 * каталог
 */


/**
 * страницы
 */

Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');
    Route::get('/religion/religion-list', 'religionList')->name('religion.list');

});
/**
 * страницы
 */


