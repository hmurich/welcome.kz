@extends('front.layout')
@section('js')
	@parent
	{{ HTML::script('//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU') }}
    {{ HTML::script('front/add/map/object_map.js') }}
@endsection

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
                        <img src="/front/img/empty_logo.png"  style='width: 100%;' />
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
                                    {{ $translator->getTransNameByKey(SysCompanyRole::getTransKey($role_id)) }}
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
                            <span class="rating__text">{{ $translator->getTransNameByKey('raiting') }}:</span>
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
                            <span>{{ $translator->getTransNameByKey('wathc') }}:</span>
                            {{ $object->view_total }} {{ $translator->getTransNameByKey('people') }}
                        </div>
                        @if ($object->relTaxi)
                            <div class="views">
                                <span>{{ $translator->getTransNameByKey('taxi_name') }}:</span>
                                <a href="tel:{{ $object->relTaxi->phone }}"> {{ $object->relTaxi->phone }}</a>
                            </div>
                        @endif
                        <a class="but middle-info__but" href="#map">{{ $translator->getTransNameByKey('show_on_map') }}</a>
                    </div>
                </div>
                @if ($role->is_reserve && $object->is_reserve)
                    <div class="zaved-middle__right">
                        <a class="but js_call_reserve_modal" href="#">{{ $translator->getTransNameByKey('bron_button') }}</a>
                    </div>
                @endif
            </div>
            <div class="zaved-content">
                <div class="zaved-content__left">
                    <div class="zaved-info">
                        <ul class="spisok">
                            <li><span>{{ $translator->getTransNameByKey('zaved_title') }}:</span>{{ $object->name }}</li>
                            @if ($standart_data)
                                <li><span>{{ $translator->getTransNameByKey('zaved_slogan') }}:</span>{{ $standart_data->slogan }}</li>
                                <li><span>{{ $translator->getTransNameByKey('zaved_address') }}:</span>{{ $standart_data->address }}</li>
                                <li><span>{{ $translator->getTransNameByKey('zaved_phone') }}:</span>{{ $standart_data->phone }}</li>
                            @endif

                            @if ($special_data)
                                @foreach ($special_data as $s)
                                    <li><span>{{ $translator->getTransNameByKey(SysFilter::getTransKey($s->filter_id)) }}:</span> {{ implode(",", $s->getVal()) }}</li>
                                @endforeach
                            @endif
                        </ul>

                        @include('front.object.include.add_comment')
                    </div>
                </div>
                <div class="zaved-content__right">
                    @include('front.object.include.news')
                </div>

                <div class="clear"></div>

                <div class="zaved-map js_map_field_main map" id='map' data-lng='{{ $location->lng }}' data-lat='{{ $location->lat }}'></div>

                <div class="clear"></div>
                <br /><br />
                <div class="zaved-info">
                    @include('front.object.include.comment')
                </div>
            </div>
        </div>
    </div>
</div>
@if ($role->is_reserve && $object->is_reserve)
    @include('front.object.include.modal_reserve')
@endif

@stop
