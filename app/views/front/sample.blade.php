@extends('front.layout')
@section('content')

<div class="wrapper wrapper--main">
    <header class="header">
        <div class="header__inner">
            <span class="header-option">
                Welcome to Kazakhstan
            </span>
            <div class="header-options">
                <select class="header-options__select header-options__select--single">
                    <option selected="true" disabled>Выберите город</option>
                    <option>Астана</option>
                    <option>Алматы</option>
                    <option>Караганда</option>
                </select>
            </div>
            <ul class="menu">
                <li class="menu__li menu__li--eda">
                    <a href="#">Еда</a>
                </li>
                <li class="menu__li menu__li--rest">
                    <a href="#">Отдых</a>
                </li>
                <li class="menu__li menu__li--pleasure">
                    <a href="#">Развлечения</a>
                </li>
                <li class="menu__li menu__li--beauty">
                    <a href="#">Красота и здоровье</a>
                </li>
                <li class="menu__li menu__li--infrastructure">
                    <a href="#">Достопремичательности</a>
                </li>
            </ul>
        </div>
        <div class="uzor uzor--one"></div>
        <div class="uzor uzor--two"></div>
        <div class="uzor uzor--three"></div>
        <div class="uzor uzor--four"></div>
    </header>
    <div class="main-part main-part--main">
        <div class="main-part__inner">
            <div class="main-up">
                <div class="social">
                    <ul class="ul-social">
                        <li>
                            <a class="soc-link" target="__blank" href="#"></a>
                        </li>
                        <li>
                            <a class="soc-link tw" target="__blank" href="#"></a>
                        </li>
                        <li>
                            <a class="soc-link inst" target="__blank" href="#"></a>
                        </li>
                    </ul>
                    <a class="where" href="#">
                        Куда сходить?
                    </a>
                </div>
                <div class="lang">
                    <select class="lang__select">
                        <option>Ru</option>
                        <option>KZ</option>
                        <option>Eng</option>
                    </select>
                </div>
            </div>
            <div class="main-search">
                <h1 class="main-search__heading">
                    Welcome<br> to kazakhstan
                </h1>
                <input class="main-search__input" type="text" placeholder="Я ищу...">
                <span class="main-search__text">
                    Гостиница, хостел, отель, ресторан, кафе, фаст-фуд, доставка ЕДЫ ...
                </span>
            </div>
            <a class="cabinet" href="#">Личный кабинет</a>
        </div>
    </div>
</div>
@stop
