<?php
Route::get('/', 'IndexController@getIndex');
Route::controller('index', 'IndexController');
Route::controller('event', 'EventController');
Route::controller('search', 'SearchController');
Route::controller('show', 'ObjectController');
Route::controller('map', 'MapController');
Route::controller('lang', 'LangController');
Route::controller('city', 'CityController');

Route::controller('push', 'PushController');

// company routes
Route::get('login', 'LoginController@getIndex');
Route::post('login', 'LoginController@postIndex');
Route::get('registration', 'LoginController@getRegistration');
Route::post('registration', 'LoginController@postRegistration');
Route::get('forgot-password', 'LoginController@getForgotPass');
Route::post('forgot-password', 'LoginController@postForgotPass');
Route::get('new-password', 'LoginController@getNewPassword');

Route::group(array('before' => 'checkCompany'), function(){
	Route::controller('cabinet', 'CabinetController');

	Route::controller('edit/field', 'CabinetFieldController');
	Route::controller('edit/news', 'CabinetNewsController');
	Route::controller('edit/comment', 'CabinetCommentController');
	Route::controller('edit/reserve', 'CabinetReserveController');
	Route::controller('edit/map', 'CabinetMapController');
	Route::controller('edit/event', 'CabinetEventController');
	Route::controller('edit/tag', 'CabinetTagController');

	Route::controller('ticket', 'TicketController');
});

// Admin controllers
Route::get('adminka/login', 'AdminController@getLogin');
Route::post('adminka/login', 'AdminController@postLogin');
Route::get('adminka/logout', 'AdminController@getLogout');

Route::group(array('before' => 'checkAdmin'), function(){
	Route::get('adminka/', 'AdminController@getIndex');
	Route::get('adminka/profile', 'AdminController@getProfile');
	Route::post('adminka/profile', 'AdminController@postProfile');

	Route::controller('adminka/directory/moderators', 'AdminModeratorController');
	Route::controller('adminka/directory/cat', 'AdminComnanyCatController');
	Route::controller('adminka/directory/role', 'AdminRoleController');

	Route::controller('adminka/directory/standart', 'AdminDirectoryController');
	Route::controller('adminka/directory/list', 'AdminDirectoryListController');

	Route::controller('adminka/translate', 'AdminTranslateController');
	Route::controller('adminka/translate-key', 'AdminTransKeyContrroller');
	Route::controller('adminka/tag', 'AdminTagController');
	Route::controller('adminka/ticket', 'AdminTicketController');
	Route::controller('adminka/filter', 'AdminFilterController');

	Route::controller('adminka/taxi', 'AdminTaxiController');

	Route::controller('adminka/event', 'AdminEventController');
	Route::controller('adminka/modarate/object', 'AdminObjectController');
	Route::controller('adminka/modarate/sort-object', 'AdminSortObjectController');

	Route::controller('adminka/site-setting', 'AdminSiteSettingController');
});

// moderator controllers
Route::get('moderator/login', 'ModeratorController@getLogin');
Route::post('moderator/login', 'ModeratorController@postLogin');
Route::get('moderator/logout', 'ModeratorController@getLogout');

Route::group(array('before' => 'checkModerator'), function(){
	Route::get('moderator/', 'ModeratorController@getIndex');
	Route::get('moderator/profile', 'ModeratorController@getProfile');
	Route::post('moderator/profile', 'ModeratorController@postProfile');

	Route::controller('moderator/ticket', 'ModeratorTicketController');
	Route::controller('moderator/event', 'ModeratorEventController');
	Route::controller('moderator/object', 'ModeratorObjectController');

});

Route::controller('test', 'TestController');
