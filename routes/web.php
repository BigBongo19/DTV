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
    Route::get('/reserveren/annuleren/{id}', 'ReserveController@cancel');
    Route::get('/profile', 'ProfileController@index')->name('profileIndex');
    Route::post('/profile/upload','ProfileController@upload');
    Route::get('/profile/remove_image','ProfileController@removeImage');
    Route::get('/edit-profile', 'ProfileController@editIndex')->name('editProfile');
    Route::post('/edit-profile/submit', 'ProfileController@edit');
    Route::post('/edit-profile/submitpassword', 'ProfileController@editPassword');
    Route::get('/payments', 'ProfileController@payment')->name('paymentIndex');

    Route::get('/reserveren', 'ReserveController@index')->name('index');

    Route::get('/toernooien', 'TournamentController@index')->name('index');
    Route::get('/toernooi/{Tournament}', 'TournamentController@getTournamentWithRegistrations')->name('index');
    Route::post('/toernooi/{Tournament}', 'TournamentController@submitTournamentRegistration');

    Route::get('/menu', 'MenuController@index')->name('index');

    // Admin only
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/home', 'AdminController@index')->name('adminIndex');
        Route::get('/admin/users', 'ProfileController@users')->name('adminUsers');
        Route::post('/admin/deleteUser/{id}', 'ProfileController@deleteUser');
        Route::get('/admin/users/edit/{id}', 'ProfileController@editPage')->name('adminEdit');
        Route::post('/admin/users/edit/{id}', 'ProfileController@editSave');

        Route::get('/admin/court', 'AdminController@courtView')->name('adminCourt');
        Route::get('/admin/court/add', 'AdminController@addCourtView')->name('adminAddCourt');
        Route::post('/admin/court/add', 'AdminController@addCourt');
        Route::get('/admin/court/edit/{id}', 'AdminController@editCourtView')->name('adminEditCourt');
        Route::post('/admin/court/edit/{id}', 'AdminController@editCourt');
        Route::delete('/admin/court/delete/{id}', 'AdminController@deleteCourt');

        Route::get('/admin/reservations', 'AdminController@reservations')->name('adminReservations');
        Route::get('/admin/reservation/add', 'AdminController@addReservationView')->name('adminAddReservations');
        Route::post('/admin/reservation/add', 'AdminController@addReservation');
        Route::get('/admin/reservation/edit/{id}', 'AdminController@editReservationView')->name('adminEditReservations');
        Route::post('/admin/reservation/edit/{id}', 'AdminController@editReservation');
        Route::delete('/admin/reservation/delete/{id}', 'AdminController@deleteReservation');

        Route::get('/admin/tournament/list', 'TournamentController@getTournamentsAdmin')->name('adminTournamentOverview');
        Route::get('/admin/tournament/add', 'AdminController@addTournament')->name('adminAddTournament');
        Route::post('/admin/tournament/add', 'TournamentController@submitTournament');
        Route::get('/admin/tournament/edit/{id}', 'TournamentController@getTournamentById');
        Route::post('/admin/tournament/edit/{id}', 'TournamentController@editTournament');
        Route::post('/admin/tournament/delete/{id}', 'TournamentController@deleteTournament');
        Route::post('/admin/tournament/registered/delete/{id}', 'TournamentController@deleteRegisteredTournament');
        Route::get('/admin/tournament/registered', 'TournamentController@getTournamentRegistration');

        Route::get('/admin/menu', 'MenuController@menuIndex')->name('menuIndex');
        Route::get('/admin/menu/edit/{id}', 'MenuController@menuEditIndex')->name('menuEditIndex');
        Route::post('/admin/menu/edit/{id}', 'MenuController@menuEdit');

        Route::post('/admin/menu/toevoegen', 'MenuController@saveMenu');
        Route::post('/admin/deleteMenuItem/{id}', 'MenuController@deleteMenu');
    });
});

// Redirects
Route::redirect('/admin', '/admin/home');


// Auth Routes
Auth::routes();
