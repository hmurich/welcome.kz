@extends('front.layout')
@section('content')

@include('front.object.include.right_block')

<div class="main-part">
    <div class="main-part__inner">
        <div class="content-part">
            <div class="zaved-up">
                <span class="zaved-up__img" style='width: 180px;'>
                    @if ($standart_data && $standart_data->logo)
                        <img src="{{ $standart_data->logo }}" style='width: 100%;' />
                    @else
                        <img src="/front/img/zaved-edit.jpg"  style='width: 100%;' />
                    @endif
                </span>
                <div class="upzaved-text">
                    <h3 class="upzaved-text__heading">
                        {{ $object->name }}
                    </h3>
                    <span class="upzaved-text__des">
                        @if ($standart_data && $standart_data->slogan)
                            {{ $standart_data->slogan }}
                        @endif
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
            <div class="zaved-photo">
                @include('front.cabinet.view.include.slider')
            </div>
            <div class="zaved-middle">
                <div class="zaved-middle__left">
                    <div class="middle-info">
                        <div class="rating">
                            <span class="rating__text">Рейтинг:</span>
                            <ul class="stars">
                                {{ ModelSnipet::generateStar($score->score_avg) }}
                            </ul>
                            <div class="ocenka">
                                <span>{{ $score->score_avg }}</span>
                                <span class="rasdel">/</span>
                                <span>5.0</span>
                            </div>
                        </div>
                        <div class="views">
                            <span>Просмотров:</span>
                            {{ $object->view_total }} человек
                        </div>
                        <a class="but middle-info__but" href="#">Показать на карте</a>
                    </div>
                </div>
                @if ($role->is_reserve && $object->is_reserve)
                    <div class="zaved-middle__right">
                        <a class="but js_call_reserve_modal" href="#">Забронировать</a>
                    </div>
                @endif
            </div>
            <div class="zaved-content">
                <div class="zaved-content__left">
                    <div class="zaved-info">
                        <ul class="spisok">
                            <li><span>Наименование:</span>{{ $object->name }}</li>
                            @if ($standart_data)
                                <li><span>Слоган:</span>{{ $standart_data->slogan }}</li>
                                <li><span>Адрес:</span>{{ $standart_data->address }}</li>
                                <li><span>Телефоны:</span>{{ $standart_data->phone }}</li>
                            @endif

                            @if ($special_data)
                                @foreach ($special_data as $s)
                                    <li><span>{{ $s->filter_name }}:</span> {{ implode(",", $s->getVal()) }}</li>
                                @endforeach
                            @endif
                        </ul>

                        @include('front.object.include.comment')
                    </div>
                </div>
                <div class="zaved-content__right">
                    @include('front.object.include.news')
                </div>
            </div>
        </div>
    </div>
</div>
@if ($role->is_reserve && $object->is_reserve)
    @include('front.object.include.modal_reserve')
@endif

@stop
