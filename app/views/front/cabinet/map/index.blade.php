@extends('front.layout')
@section('js')
	@parent
	{{ HTML::script('//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU') }}
    {{ HTML::script('front/add/map/map.js') }}
@endsection

@section('content')

@include('front.cabinet.include.menu')
<div class="main-part js_map_field_main" data-city_center='{{ $def_city->sys_name }}'>
	<div class="main-part__inner">
		<div class="content-part">
            {{ Form::open(array('url'=>action('CabinetMapController@postIndex', $object->id), 'method' => 'post', 'files'=> true)) }}
			<div class="zaved-up">
        	<div class="mob-start mob-start--add">
            <span></span>
            <span></span>
            <span></span>     
        	</div>
				<span class="h-heading">{{ $title }}</span>
			</div>	
			<div class="edit-parts">
				<div class="edit-row">
					<label class="edit-row__label" for="lng">
						Ширина:
					</label>
					<input class="edit-row__input" id="lng" name='lng' type="text" value="{{ $map->lng }}" required="">
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="lat">
						Долгота:
					</label>
					<input class="edit-row__input" id="lat" name='lat' type="text"  value="{{ $map->lat }}" required="">
				</div>
                <div class="edit-textarea">
                    <div id="map" style="width:100%; height:500px"></div>
                </div>

			</div>
			<button class="but" type="submit">Сохранить</button>
            {{ Form::close() }}
		</div>
	</div>
</div>


@stop
