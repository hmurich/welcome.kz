@extends('front.layout')
@section('content')

<div class="wrapper wrapper--main">
    <header class="header">
        @include('front.index.include.header')
    </header>
    <div class="main-part main-part--main">
        <div class="main-part__inner">
            <div class="main-up">
                <div class="social">
                    <ul class="ul-social">
                        <li>
                            <a class="soc-link" target="__blank" href="{{ SiteSetting::getNameByKey('facebook') }}"></a>
                        </li>
                        <li>
                            <a class="soc-link tw" target="__blank" href="{{ SiteSetting::getNameByKey('twitter') }}"></a>
                        </li>
                        <li>
                            <a class="soc-link inst" target="__blank" href="{{ SiteSetting::getNameByKey('instagramm') }}"></a>
                        </li>
                    </ul>
                    <a class="where" href="{{ action('EventController@getIndex') }}">
                        Куда сходить?
                    </a>
                </div>
                <div class="lang">
                    <form method="post" action='{{ action('LangController@anyChange') }}' class='js_change_lang_id_form'>
                        <select class="lang__select js_change_lang_id" name='lang_id'>
                            @foreach (SysLang::getSysAr() as $id=>$name)
                                <option value='{{ $id }}' {{ (SysLang::getLangID() == $id ? 'selected' : null) }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
            <div class="main-search">
                <h1 class="main-search__heading">
                    Welcome<br> to kazakhstan
                </h1>
                <form method="GET" action='{{ action("SearchController@getIndex") }}' class='js_send_search_form'>
                    <input class="main-search__input js_send_search_value" type="text" placeholder="Я ищу..." name='search'>
                    <img src='/front/img/search.png' class='js_send_search' />
                </form>
                <span class="main-search__text">
                    Гостиница, хостел, отель, ресторан, кафе, фаст-фуд, доставка ЕДЫ ...
                </span>
            </div>
            <a class="cabinet" href="{{ action('CabinetController@getIndex') }}">Личный кабинет</a>
        </div>
    </div>
</div>
@stop
