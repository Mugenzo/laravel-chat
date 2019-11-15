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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::namespace('Messages')->group(function () {
    Route::get('send', 'MessageController@send');
});

Route::namespace('Front')->group(function () {
    Route::get('chats/{id}/settings', 'ChannelController@settings')->name('chats.settings');
    Route::post('chats/{id}/settings', 'ChannelController@settingsUpdate')->name('chats.settings.update');
    Route::resource('chats', 'ChannelController');
});

Route::get('/home', 'HomeController@index')->name('home');
