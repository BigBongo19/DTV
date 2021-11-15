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

Route::get('/', 'IndexController@index')->name('index');

// Authenticated users only
Route::middleware(['auth'])->group(function () {
    Route::get('/reserveren', 'ReserveController@index')->name('index');
    Route::get('/tournooien', 'TournamentController@index')->name('index');
});

// Auth Routes
Auth::routes();
