@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')

<div class="main-part" id="content">
    <div class="main-part__inner">
        <div class="content-part">
            <div class="zaved-up">
                <span class="zaved-up__img" href="#">
                    <img src="{{ $standart_data->logo }}">
                </span>
                <div class="upzaved-text">
                    <h3 class="upzaved-text__heading">
                        {{ $object->name }}
                    </h3>
                    <span class="upzaved-text__des">
                        {{ $standart_data->slogan }}
                    </span>
                    <ul class="zaved-menu">
                        @include('front.cabinet.include.top_menu')
                    </ul>
                </div>
            </div>
            <div class="zaved-news">
                @if ($news->image)
                    <img class="zaved-news__img" src="{{ $news->image }}" />
                @endif
                <h1>{{ $news->title }}</h1>
                {{ $news->note }}
            </div>
        </div>
    </div>
</div>

@stop
