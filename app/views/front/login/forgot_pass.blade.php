@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('LoginController@postForgotPass'), 'method' => 'post')) }}
                <span class="vhod__heading">{{ $translator->getTransNameByKey('forgot_pass_title') }}</span>
                <input class="vhod__input" name='email' type="email" placeholder="{{ $translator->getTransNameByKey('forgot_pass_email') }}" required="">
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">{{ $translator->getTransNameByKey('forgot_pass_send') }}</button>
                    <a class="but vhod-but__right" href="{{ action('LoginController@getIndex') }}">{{ $translator->getTransNameByKey('forgot_pass_back') }}</a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
