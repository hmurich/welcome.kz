@extends('front.layout')
@section('js')
	@parent
	{{ HTML::script('//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU') }}
    {{ HTML::script('front/add/map/search_map.js') }}
@endsection

@section('content')

@include('front.search.include.right_menu')

<div class="main-part">
	<div class="map" id='map'></div>
</div>

@stop
