@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')

<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
			<div class="up-heading">
                <h3 class="up-heading__heading">
				  {{ $title }}
			   </h3>
               <a class="but" href='{{ action("TicketController@getNewEvent", $object->id) }}'>{{ $translator->getTransNameByKey('event_add'); }}</a>
            </div>
			<ul class="where-ul">
                @foreach ($events as $e)
                    <li>
                        <a class="where-img" href="#">
                            <img src="{{ $e->image }}">
                        </a>
                        <div class="where-text">
                            <div class="where-text__inner">
                                <span class="where-text__heading" href="#">
                                    {{ $e->title }} {{ (!$e->is_active ? $translator->getTransNameByKey('event_on_madarete') : $translator->getTransNameByKey('event_publish')) }}
                                </span>
                                <ul class="cont-ul">
                                    <li>
                                        {{ $e->note }}
                                    </li>
                                    <li><b>{{ $translator->getTransNameByKey('event_date') }}:</b> {{ $e->date_event_name }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('event_time') }}:</b> {{ $e->time_event }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('event_duration') }}:</b> {{ $e->duration }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('event_zaved') }}:</b> {{ $e->relObject->name }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('event_address') }}:</b> {{ $e->relObject->relStandartData->address }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('event_phone') }}:</b> {{ $e->relObject->relStandartData->phone }}</li>

                                </ul>
                                <div class="where-rate">
                                    <div class="rating">
                                        <span class="rating__text">{{ $translator->getTransNameByKey('raiting') }}:</span>
                                        <ul class="stars">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                        <div class="ocenka">
                                            <span>{{ $e->relObject->relScore->score_avg }}</span>
                                            <span class="rasdel">/</span>
                                            <span>5.0</span>
                                        </div>
                                    </div>
                                    @if ($e->relObject->is_active && $e->relObject->is_open)
                                        <a class="but where-rate__but" href="{{ action('ObjectController@getIndex', $e->object_id) }}">{{ $translator->getTransNameByKey('cabinet') }}</a>
                                    @else
                                        <span class="but where-rate__but">{{ $translator->getTransNameByKey('cabinet_close') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
		</div>
	</div>
</div>

@stop
