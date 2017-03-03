@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('LoginController@postIndex'), 'method' => 'post')) }}
                <span class="vhod__heading">Личный кабинет</span>
                <input class="vhod__input" name='login' type="text" placeholder="Логин" required="">
                <input class="vhod__input" name='password' type="password" placeholder="Пароль" required="">
                <a class="vhod__forget" href="{{ action('LoginController@getForgotPass') }}">Восстановить пароль...</a>
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">Войти</button>
                    <a class="but vhod-but__right" href="{{ action('LoginController@getRegistration') }}">Зарегистрироваться</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
