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

    // Admin Route
    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::get('/', 'Admin\HomeController@index')->name('admin.home');
        Route::get('/logout', 'Auth\AuthController@logout')->name('admin.logout');

        // Code List
        Route::prefix('/code')->group(function () {
            Route::get('/', function () {
                return redirect()->route('code.show.index');
            });
            Route::get('/json', 'Admin\CodeController@json')->name('code.json');
            Route::get('/{id}/delete', 'Admin\CodeController@delete')->name('code.delete');
            Route::resource('/show', 'Admin\CodeController', ['as' => 'code'])->except(['destroy']);
        });

        // Tutorial List
        Route::prefix('/tutorial')->group(function () {
            Route::get('/', function () {
                return redirect()->route('tutorial.show.index');
            });
            Route::get('/json', 'Admin\TutorialController@json')->name('tutorial.json');
            Route::get('/{id}/delete', 'Admin\TutorialController@delete')->name('tutorial.delete');
            Route::resource('/show', 'Admin\TutorialController', ['as' => 'tutorial'])->except(['destroy']);
        });
    });
});