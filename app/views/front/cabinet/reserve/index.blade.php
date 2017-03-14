@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')

<div class="main-part" id="content">
	<div class="main-part__inner">
		<div class="content-part">
			<div class="zaved-up">
				<div class="upzaved-text">
					<h3 class="upzaved-text__heading">
						{{ $title }}
					</h3>
					<span class="upzaved-text__des">
						<a href='{{ action("CabinetReserveController@getOpenReserve", $object->id) }}'>
                            @if ($object->is_reserve)
                                {{ $translator->getTransNameByKey('bron_close_status') }}
                            @else
								{{ $translator->getTransNameByKey('bron_open_status') }} 
                            @endif
                        </a>
					</span>
				</div>
			</div>
			<ul class="where-ul">
                @foreach ($reserves as $r)
                    <li class='spec'>
                        <div class="where-text">
                            <div class="where-text__inner">
                                <span class="where-text__heading" href="#">
                                    {{ $r->name }}
                                </span>
                                <ul class="cont-ul">
                                    <li>
                                        {{ $r->note }}
                                    </li>
                                    <li><b>{{ $translator->getTransNameByKey('bron_phone') }}:</b> {{ $r->phone }}</li>
                                    <li><b>Email:</b> {{ $r->email }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('bron_date') }}:</b> {{ $r->enter_date }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('bron_time') }}:</b> {{ $r->enter_time }}</li>
                                    <li><b>{{ $translator->getTransNameByKey('bron_create_at') }}:</b> {{ $r->created_at }}</li>
                                </ul>
                                <div class="where-rate">
                                    @if (!$r->is_accept)
                                        <a class="but where-rate__but" href="{{ action('CabinetReserveController@getAccept', array($r->object_id, $r->id)) }}">{{ $translator->getTransNameByKey('bron_has_close') }}</a>
                                    @else
                                        <span class="but where-rate__but">{{ $translator->getTransNameByKey('bron_has_closed') }}</span>
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
