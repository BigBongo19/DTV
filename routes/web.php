<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/menu', 'MenuController@index')->name('menu');

// Authenticated users only
Route::middleware(['auth'])->group(function () {
    Route::get('/reserveren', 'ReserveController@index')->name('reserveIndex');
    Route::get('/profile', 'ProfileController@index')->name('profileIndex');
    Route::get('/edit-profile', 'ProfileController@edit')->name('editIndex');
    Route::get('/payments', 'ProfileController@payment')->name('paymentIndex');
    Route::get('/reserveren', 'ReserveController@index')->name('index');
    Route::get('/toernooien', 'TournamentController@index')->name('index');
    Route::get('/toernooi', 'TournamentDetailController@index')->name('index');

    // Admin only
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', 'AdminController@index')->name('adminIndex');
        Route::get('/admin/users', 'AdminController@users')->name('adminUsers');
        Route::get('/admin/users/edit', 'AdminController@edit')->name('adminEdit');
        Route::get('/admin/toernooiList', 'AdminController@toernooiOverview')->name('adminToernooiOverview');
        Route::get('/admin/addToernooi', 'AdminController@addToernooi')->name('adminAddToernooi');
        Route::get('/admin/reservations', 'AdminController@reservations')->name('adminReservations');
    });


});

// Redirects
Route::redirect('/admin', '/admin/home');


// Auth Routes
Auth::routes();
