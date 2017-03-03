<?php
class ModeratorController extends BaseController {
    function getIndex () {

        return View::make('moderators.index');
    }

	function getLogin() {
        return View::make('moderators.login');
    }

    function postLogin () {
        $input = array(
			'email' => Input::get('email'),
			'password'  => Input::get('password'),
			'type_id'  => 2
		);

        //echo '<pre>'; print_R($input); echo '</pre>'; exit();

		if (Auth::attempt($input,true))
			return Redirect::action('ModeratorController@getIndex');

		$alert = "Invalid combination of username and password";

		return Redirect::back()->withError($alert);
    }

    function getProfile () {
        $user = Auth::user();

        $ar = array();
		$ar['user'] = $user;
		$ar['title'] = 'Profile';
        $ar['item'] = Moderator::where('user_id', $user->id)->firstOrFail();

		return View::make('moderators.profile', $ar);
    }

    function postProfile () {
        DB::beginTransaction();

        $user = Auth::user();
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
        $user->save();

        $item = Moderator::where('user_id', $user->id)->firstOrFail();
        $item->name = Input::get('name');
        $item->address = Input::get('address');
        $item->phone = Input::get('phone');
        $item->mobile = Input::get('mobile');
        $item->note = Input::get('note');
        $item->password = Input::get('password');

        if (!$item->user_id)
            $item->user_id = $user->id;

        $item->save();

        DB::commit();

		return Redirect::back()->with('success', 'Данные успешно сохранены');
    }

    function getLogout(){
        Auth::logout();

		return Redirect::action('ModeratorController@getLogin');
    }
}
