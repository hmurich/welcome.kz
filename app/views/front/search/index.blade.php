@extends('front.layout')
@section('js')
	@parent
	{{ HTML::script('//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU') }}
    {{ HTML::script('front/add/map/search_map.js') }}
@endsection

@section('content')

@include('front.search.include.right_menu')

<div class="main-part" id="content">
	<div class="map" id='map'>
		<div class="mam-up">
      <div class="mob-start mob-start--add">
          <span></span>
          <span></span>
          <span></span>     
      </div>
    </div> 
	</div>
</div>

@stop
