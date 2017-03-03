<?php
App::before(function($request)
{
	//
});


App::after(function($request, $response)
{

});

Route::filter('checkAdmin', function(){
	if (Auth::check() && Auth::user()->type_id!=1)
		Auth::logout();

	if (!(Auth::check()))
		return Redirect::action('AdminController@getLogin');
});

Route::filter('checkModerator', function(){
	if (Auth::check() && Auth::user()->type_id!=2)
		Auth::logout();

	if (!(Auth::check()))
		return Redirect::action('ModeratorController@getLogin');
});

Route::filter('checkModerateFunction', function(){
	if (Auth::check() && !in_array(Auth::user()->type_id, array(2, 1)))
		return Redirect::back()->with('У Вас нету доступа для просмотра этой страницы');

	if (!(Auth::check()))
		return Redirect::action('ModeratorController@getLogin');
});


Route::filter('checkCompany', function(){
	if (Auth::check() && Auth::user()->type_id!=3)
		Auth::logout();

	if (!(Auth::check()))
		return Redirect::action('LoginController@getIndex');
});
