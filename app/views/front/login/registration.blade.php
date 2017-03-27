@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('LoginController@postRegistration'), 'method' => 'post')) }}
                <span class="vhod__heading">{{ $translator->getTransNameByKey('registr_title') }}</span>
                <input class="vhod__input" name='login' type="text" placeholder="{{ $translator->getTransNameByKey('registr_login') }}" required="">
                <div class="password-div">
                	<input class="vhod__input vhod__input--password" name='password' type="password" placeholder="{{ $translator->getTransNameByKey('registr_pass') }}" required="" pattern="[a-zA-Z0-9]{8,}">
                </div>
                <input class="vhod__input" name='email' type="email" placeholder="{{ $translator->getTransNameByKey('registr_email') }}" required="">
                <input class="vhod__input" name='name' type="text" placeholder="{{ $translator->getTransNameByKey('registr_name') }} " required="">
                <input class="vhod__input" name='address' type="text" placeholder="{{ $translator->getTransNameByKey('registr_address') }}" required="">
                <input class="vhod__input" name='phone' type="text" placeholder="{{ $translator->getTransNameByKey('registr_phone') }}" required="">
                <textarea class="vhod__textarea" name='note' placeholder="{{ $translator->getTransNameByKey('registr_note') }}"></textarea>
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">{{ $translator->getTransNameByKey('registr_send') }}</button>
                    <a class="but vhod-but__right" href="{{ action('LoginController@getIndex') }}">{{ $translator->getTransNameByKey('registr_back') }}</a>
                </div>
            {{ Form::close() }}
        </div>

    </div>
</div>
@stop
