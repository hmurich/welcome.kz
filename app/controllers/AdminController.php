<?php
class AdminController extends BaseController {
    function getIndex () {

        return View::make('admin.index');
    }

	function getLogin() {
        return View::make('admin.login');
    }

    function postLogin () {
        $input = array(
			'email' => Input::get('email'),
			'password'  => Input::get('password'),
			'type_id'  => 1
		);

        //echo '<pre>'; print_R($input); echo '</pre>'; exit();

		if (Auth::attempt($input,true))
			return Redirect::action('AdminController@getIndex');

		$alert = "Invalid combination of username and password";

		return Redirect::back()->withError($alert);
    }

    function getProfile () {
        $ar = array();
		$ar['user'] = Auth::user();
		$ar['title'] = 'Profile';

		return View::make('admin.profile', $ar);
    }

    function postProfile () {
        $user = Auth::user();
		$user->email = Input::get('email');
        if (Input::has('password') && Input::get('password'))
		      $user->password = Hash::make(Input::get('password'));

		if (!$user->save())
			return Redirect::back()->withErrors($user->getErrors());

		return Redirect::back()->with('success', 'Data saved successfully');
    }

    function getLogout(){
        Auth::logout();

		return Redirect::action('AdminController@getLogin');
    }
}
