@extends('front.layout')
@section('content')

@include('front.object.include.right_block')

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
                        @foreach ($other_objects as $id=>$role_id)
                            <li>
                                <a class="zaved-item {{ ($role_id == $object->role_id ? 'zaved-item--active' : 'zaved-item') }}"
                                    href="{{ action('ObjectController@getIndex', $id) }}">
                                    {{ $ar_role[$role_id] }}
                                </a>
                            </li>
                        @endforeach
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
