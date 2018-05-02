<?php

	Route::get('/', 'IndexController@index')->name('main');

	Route::get('/login', 'LoginController@index');

	Route::get('/news-details/{id}', 'NewsDetailsController@index')->name('news-details');

	Route::get('/news-category', 'NewsCatController@index');

	Route::get('/emergencycontact-details/{id}', 'EmergencyDetController@index')->name('emergency-details');

	Route::get('/emergencycontact-category', 'EmergencyCatController@index');

	Route::get('/event-category', 'EventCatController@index');

	Route::get('/event-details/{id}', 'EventDetController@index')->name('event-details');

	Route::get('/placeofinterest-category', 'PlaceOfInterestCatController@index');

	Route::get('/placeofinterest-details/{id}', 'PlaceOfInterestDetController@index')->name('placeofinterest-details');

	Route::post('/placeofinterest-details/{id}/addComment', 'PlaceOfInterestDetController@addComment')->name('placeofinterest-details');

	Route::get('/my-favorites', 'MyFavoritesController@index');

	Route::post('/post-bookmark', 'MyFavoritesController@postBookmark');

	Route::get('/publictransport-category', 'PublicTransportCatController@index');

	Route::get('/publictransport-details/{id}', 'PublicTransportDetController@index');

	Route::get('/searchresults', 'SearchresultsController@index');

	Route::get('/search', 'SearchresultsController@search');

	Route::post('/search', 'SearchresultsController@search');

	Route::get('/logout', 'LogoutController@logout');

	Route::get('/login', 'LoginController@index')->name('login')->middleware('guest');

	Route::get('/signup', 'LoginController@regist');

	Route::post('/register','IndexController@register');

	Route::post('/forgotpassword', 'ProfileController@resetPassword');

	Route::post('/favs','PlaceOfInterestDetController@favs');

	Route::post('/unfavs','PlaceOfInterestDetController@unfavs');

	Route::post('/auth', 'LoginController@login');

	Route::get('/profile', 'ProfileController@index')->name('profile');
	
	Route::post('/update', 'ProfileController@update2');

	Route::get('/forgot','ProfileController@forgotPassword');

	Route::get('/reset', 'ProfileController@resetNewPassword');

	Route::get('/check','PlaceOfInterestDetController@checkLike');