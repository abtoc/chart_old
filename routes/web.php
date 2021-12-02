<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile/search', 'ProfileController@search')->name('profile.search');
    Route::get('/profile/{user}', 'ProfileController@view')->name('profile.view');

    Route::get('/message/{user}', 'MessageController@index')->name('message.index');
    Route::get('/message/{user}/create', 'MessageController@create')->name('message.create');
    Route::post('/message/{user}/post', 'MessageController@post')->name('message.post');
});