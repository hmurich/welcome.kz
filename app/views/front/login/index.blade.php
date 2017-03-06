@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('LoginController@postIndex'), 'method' => 'post')) }}
                <span class="vhod__heading">{{ $translator->getTransNameByKey('login_title') }}</span>
                <input class="vhod__input" name='login' type="text" placeholder="{{ $translator->getTransNameByKey('login') }}" required="">
                <input class="vhod__input" name='password' type="password" placeholder="{{ $translator->getTransNameByKey('password') }}" required="">
                <a class="vhod__forget" href="{{ action('LoginController@getForgotPass') }}">{{ $translator->getTransNameByKey('forgot_pass_href') }}</a>
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">{{ $translator->getTransNameByKey('login_enter') }}</button>
                    <a class="but vhod-but__right" href="{{ action('LoginController@getRegistration') }}">{{ $translator->getTransNameByKey('auth_href') }}</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
