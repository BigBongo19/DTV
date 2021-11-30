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
    Route::get('/reserveren/baan/{id}', 'ReserveController@ReserveCourt');
    Route::post('/reserveren/bevestigen', 'ReserveController@ConfirmResevation');
    Route::get('/profile', 'ProfileController@index')->name('profileIndex');
    Route::post('/profile/upload','ProfileController@upload');
    Route::get('/profile/remove_image','ProfileController@removeImage');
    Route::get('/edit-profile', 'ProfileController@editIndex')->name('editProfile');
    Route::post('/edit-profile/submit', 'ProfileController@edit');
    Route::post('/edit-profile/submitpassword', 'ProfileController@editPassword');
    Route::get('/payments', 'ProfileController@payment')->name('paymentIndex');
    Route::get('/toernooien', 'TournamentController@index')->name('index');
    Route::get('/toernooi/{Tournament}', 'TournamentController@getTournamentWithRegistrations')->name('index');
    Route::post('/toernooi/{Tournament}', 'TournamentController@submitTournamentRegistration');
    Route::get('/menu', 'MenuController@index')->name('index');

    // Admin only
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', 'AdminController@index')->name('adminIndex');
        Route::get('/admin/users', 'AdminController@users')->name('adminUsers');
        Route::post('/admin/users', 'AdminController@deleteUser');
        Route::get('/admin/users/edit/{id}', 'AdminController@edit')->name('adminEdit');
        Route::post('/admin/users/edit/{id}', 'AdminController@editSave');
        Route::get('/admin/tournamentList', 'TournamentController@getTournamentsAdmin')->name('adminTournamentOverview');
        Route::get('/admin/addTournament', 'AdminController@addTournament')->name('adminAddTournament');
        Route::post('/admin/addTournament', 'TournamentController@submitTournament');
        Route::get('/admin/editTournament/{id}', 'TournamentController@getTournamentById');
        Route::post('/admin/editTournament/{id}', 'TournamentController@editTournament');
        Route::post('/admin/deleteTournament/{id}', 'TournamentController@deleteTournament');
        Route::get('/admin/reservations', 'AdminController@reservations')->name('adminReservations');
        Route::get('/admin/menu', 'AdminController@menuIndex')->name('menuIndex');
        Route::get('/admin/menu/toevoegen', 'AdminController@menuToevoegen')->name('menuToevoegen');
        Route::post('/admin/menu/toevoegen', 'MenuController@saveMenu');
    });
});

// Redirects
Route::redirect('/admin', '/admin/home');


// Auth Routes
Auth::routes();
