<?php

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
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'HomeController')->name('home.page');
    Route::get('/file/{id}', 'File\ShowController')->name('detail.page');
    Route::get('/login', 'Auth\LoginFormController')->name('login.page');
    Route::post('/login', 'Auth\LoginController')->name('login.user');
    Route::get('/profile', 'Auth\ProfileController')->name('profile.page');
    Route::get('/essays', 'File\IndexFileController')->name('index.file');
});

Route::group(['namespace' => 'App\Http\Controllers', 'middleware' => ['auth']], function () {
    Route::post('/logout', 'Auth\LogoutController')->name('logout.user');
    Route::post('/essay', 'File\CreateFileController')->name('upload.file');
});
