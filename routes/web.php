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

Route::get('/', 'MainController@index');
// Route::get('/ticket', 'MainController@single_ticket');
Route::get('/events', 'MainController@eventPage');
Route::get('/events/{id}', 'MainController@single_ticket');
Route::get('/movies', 'MainController@moviePage');
Route::get('/search/l', 'MainController@catSearch');
Route::get('/search/e', 'MainController@searchByDate');
Route::get('/movies/{id}/{name}', 'MainController@moviePageSingle');
Route::get('/search/movies/{category}', 'MainController@categoryMovie');
Route::get('sports', 'MainController@sportPage');

Route::group(['middleware' => ['user_only']], function(){
	Route::prefix('user')->group(function(){
	  	Route::get('/', 'UserController@index');
	  	Route::get('/new/event', 'UserController@newEventPage');
	  	Route::get('/ordered-tickets', 'UserController@orderedTicketsPage');
	  	Route::get('/booked-movies', 'UserController@bookedMoviesPage');
	  	Route::post('events', 'UserController@storeEvent');
			Route::get('events', 'UserController@getEvents');
			Route::delete('events/{id}', 'UserController@deleteEvent');
	  	Route::post('book/pick_seat', 'UserController@bookMovie');
	  	Route::post('book/pick_seat/submit', 'UserController@bookMovieSubmit')->name('book.movie');
			Route::post('tickets', 'UserController@orderEvent');
			Route::get('tickets', 'UserController@getOrderedEvents');
			Route::get('tickets/{id}', 'UserController@getTicket');
			Route::get('tickets-movie/{id}', 'UserController@getTicketMovie');
	});
});

Route::group(['middleware' => ['admin_only']], function(){
	Route::prefix('admin')->group(function(){
		Route::get('/', 'AdminController@index');
		Route::get('events', 'AdminController@getEvents');
		Route::put('approve/events/{id}', 'AdminController@approveEvent');
		Route::put('decline/events/{id}', 'AdminController@declineEvent');
	});
});

Route::group(['middleware' => ['xxi_only']], function(){
	Route::prefix('xxi')->group(function(){
		Route::get('/', 'CinemaController@index');
  	Route::get('/new/film', 'CinemaController@newFilmPage');
		Route::get('/cinema', 'CinemaController@listCinemas');
		Route::get('/film', 'CinemaController@listFilms');
		Route::get('/film-coming', 'CinemaController@listFilmsComing');
  	Route::post('films', 'CinemaController@storeFilm');
  	Route::post('change-status', 'CinemaController@changeStatus');
  	Route::post('delete', 'CinemaController@deleteFilm');
  	Route::post('schedules', 'CinemaController@storeSchedule');
	});
});

Auth::routes();
