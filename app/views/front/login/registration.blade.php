@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('LoginController@postRegistration'), 'method' => 'post')) }}
                <span class="vhod__heading">Регистрация</span>
                <input class="vhod__input" name='login' type="text" placeholder="Логин" required="">
                <input class="vhod__input" name='password' type="password" placeholder="Пароль" required="">
                <input class="vhod__input" name='email' type="email" placeholder="Почтовый адресс" required="">
                <input class="vhod__input" name='name' type="text" placeholder="Наименование " required="">
                <input class="vhod__input" name='address' type="text" placeholder="Адресс " required="">
                <input class="vhod__input" name='phone' type="text" placeholder="Телефон" required="">
                <textarea class="vhod__textarea" name='note' placeholder="Описание"></textarea>
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">Отправить</button>
                    <a class="but vhod-but__right" href="{{ action('LoginController@getIndex') }}">Назад</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
