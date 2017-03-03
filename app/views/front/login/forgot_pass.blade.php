@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('LoginController@postForgotPass'), 'method' => 'post')) }}
                <span class="vhod__heading">Забыли пароль</span>
                <input class="vhod__input" name='email' type="email" placeholder="Введите почтовый адресс для восстановления пароля" required="">
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">Отправить</button>
                    <a class="but vhod-but__right" href="{{ action('LoginController@getIndex') }}">Назад</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
