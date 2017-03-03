<?php
class LoginController extends PublicController {
    function getIndex () {
        $ar = array();
        $ar['title'] = 'Вход в личный кабинет';
        $ar['translator'] = $this->translator;

        return View::make('front.login.index', $ar);
    }

    function postIndex () {
        $input = array(
			'login' => Input::get('login'),
			'password'  => Input::get('password'),
			'type_id'  => 3
		);

		if (!Auth::attempt($input,true)){
            $alert = "Неправильный логин или пароль";
    		return Redirect::back()->withError($alert);
        }

        $user = Auth::user();
        if ($user->relForgotPass)
            UserForgotPass::where('user_id', $user->id)->delete();

        return Redirect::action('CabinetController@getIndex');
    }

    function getRegistration () {
        $ar = array();
        $ar['title'] = 'Регистрация';
        $ar['translator'] = $this->translator;

        return View::make('front.login.registration', $ar);
    }

    function postRegistration () {
        $rules = array(
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'login' => 'required|unique:users',
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Redirect::back()->withErrors($validator);

        DB::beginTransaction();

        $user = new User();
        $user->email = Input::get('email');
        $user->login = Input::get('login');
        $user->password = Hash::make(Input::get('password'));
        $user->type_id = 3;
        $user->save();

        $company = new Company();
        $company->name = Input::get('name');
        $company->address = Input::get('address');
        $company->phone = Input::get('phone');
        $company->note = Input::get('note');
        $company->user_id = $user->id;
        $company->save();

        DB::commit();

        return Redirect::action('LoginController@getIndex')->with('success', 'Вы успешно прошли регистрацию');
    }

    function getForgotPass () {
        $ar = array();
        $ar['title'] = 'Забыли пароль';
        $ar['translator'] = $this->translator;

        return View::make('front.login.forgot_pass', $ar);
    }

    function postForgotPass(){
        $user = User::where(array('email'=>Input::get('email'), 'type_id'=>3))->first();
        if (!$user)
            return Redirect::back()->with('error', 'Указанный адрес электронной почты не существует');

        $for_pass = UserForgotPass::where('user_id', $user->id)->first();
        if (!$for_pass){
            $for_pass = new UserForgotPass();
            $for_pass->user_id = $user->id;
            $for_pass->confirm_key = mt_rand(10000000, 999999999);
            $for_pass->save();
        }

        $company = $user->relCompany;

        $note = '<p>Для получения нового пароля пройдите по ';
        $note .= '<a href="'.action('LoginController@getNewPassword').'?confirm_key='.$for_pass->confirm_key.'&user_id='.$user->id.'">';
        $note .= 'это ссылке</a></p>';

        MailSend::send($user->email, 'Инструкция по получению нового пароля', $note, $company->name);

        return Redirect::action('LoginController@getIndex')->with('success', 'На Ваш почтовый адресс были высланы инстукции по восстановлению пароля');
    }

    function getNewPassword(){
        if (!Input::has('confirm_key') || !Input::has('user_id'))
            return App::abort(404);

        $user = User::findOrFail(Input::get('user_id'));
        $user_pass = UserForgotPass::where(array('user_id'=>$user->id, 'confirm_key'=>Input::get('confirm_key')))->first();
        if (!$user_pass)
            return App::abort(404);

        $user_pass->delete();

        $pass = mt_rand(100000, 999999);
        $user->password = Hash::make($pass);
        $user->save();

        $company = $user->relCompany;

        $note = '<p>Ваш логин для доступа в кабинет:'.$user->login.' </p>';
        $note = '<p>Ваш пароль:'.$pass.' </p>';

        MailSend::send($user->email, 'Новый пароль для входа в кабинет', $note, $company->name);

        return Redirect::action('LoginController@getIndex')->with('success', 'На Ваш почтовый адресс были выслан новый пароль');
    }



}
