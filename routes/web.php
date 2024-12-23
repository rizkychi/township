<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('web')->group(function () {
    // Public Route
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login', 'Auth\AuthController@form')->name('login');
    Route::post('/login', 'Auth\AuthController@login')->name('doLogin');
    Route::get('/topic/{topic}', 'HomeController@topic')->name('topic');
    Route::get('/post/{url}', 'HomeController@post')->name('post');
    Route::get('/search', 'HomeController@search')->name('search');
    Route::get('/register', 'HomeController@registerForm')->name('register');
    Route::post('/register', 'HomeController@register');
    Route::get('/member', 'HomeController@member')->name('member');
    Route::get('/catalog', 'HomeController@catalog')->name('catalog');

    // Admin Route
    Route::prefix('dash')->middleware('auth')->group(function () {
        Route::get('/', 'Admin\HomeController@index')->name('admin.home');
        Route::get('/logout', 'Auth\AuthController@logout')->name('admin.logout');
        Route::get('/password', 'Admin\PasswordController@index')->name('admin.password.index');
        Route::post('/password', 'Admin\PasswordController@update')->name('admin.password.update');

        // Anggota
        Route::prefix('anggota')->group(function () {
            Route::get('json', 'Admin\AnggotaController@json')->name('admin.anggota.json');
            Route::post('get_detail', 'Admin\AnggotaController@getDetail')->name('admin.anggota.detail');
            Route::get('{anggota}/delete', 'Admin\AnggotaController@delete')->name('admin.anggota.delete');
        });
        Route::resource('anggota', 'Admin\AnggotaController', ['as' => 'admin'])->except(['destroy']);

        // Enroll
        Route::prefix('enrollment')->group(function () {
            Route::get('json', 'Admin\EnrollmentController@json')->name('admin.enrollment.json');
            Route::post('get_detail', 'Admin\EnrollmentController@getDetail')->name('admin.enrollment.detail');
            Route::get('{enrollment}/delete', 'Admin\EnrollmentController@delete')->name('admin.enrollment.delete');
        });
        Route::resource('enrollment', 'Admin\EnrollmentController', ['as' => 'admin'])->except(['destroy', 'create', 'store']);

        // Content
        Route::prefix('content')->group(function () {
            Route::get('json', 'Admin\ContentController@json')->name('admin.content.json');
            Route::get('{content}/delete', 'Admin\ContentController@delete')->name('admin.content.delete');
        });
        Route::resource('content', 'Admin\ContentController', ['as' => 'admin'])->except(['destroy']);

        // Banner
        Route::prefix('banner')->group(function () {
            Route::get('json', 'Admin\BannerController@json')->name('admin.banner.json');
            Route::get('{banner}/delete', 'Admin\BannerController@delete')->name('admin.banner.delete');
        });
        Route::resource('banner', 'Admin\BannerController', ['as' => 'admin'])->except(['destroy']);

        // Catalog
        Route::prefix('catalog')->group(function () {
            Route::get('json', 'Admin\CatalogController@json')->name('admin.catalog.json');
            Route::get('{catalog}/delete', 'Admin\CatalogController@delete')->name('admin.catalog.delete');
            Route::get('catalog/image/{id}/delete', 'Admin\CatalogController@imageDelete')->name('admin.catalog.image.delete');
        });
        Route::resource('catalog', 'Admin\CatalogController', ['as' => 'admin'])->except(['destroy']);

        // Ads
        Route::prefix('ads')->group(function () {
            Route::get('json', 'Admin\AdsController@json')->name('admin.ads.json');
            Route::get('{ads}/delete', 'Admin\AdsController@delete')->name('admin.ads.delete');
        });
        Route::resource('ads', 'Admin\AdsController', ['as' => 'admin'])->except(['destroy', 'create', 'store']);

        // Image Upload
        Route::post('image_upload', 'Admin\ImageUploadController@storeImage')->name('image.upload');
    });
});