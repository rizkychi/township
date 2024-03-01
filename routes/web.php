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
    Route::get('/post/{id}', 'HomeController@post')->name('post');
    Route::get('/search', 'HomeController@search')->name('search');
    Route::get('/register', 'HomeController@registerForm')->name('register');
    Route::post('/register', 'HomeController@register');
    Route::get('/member', 'HomeController@member')->name('member');

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
    });
});