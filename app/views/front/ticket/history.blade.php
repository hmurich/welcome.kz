@extends('front.layout')
@section('content')
<div class="main-part__inner">
	<div class="content-part">
		<span class="h-heading">{{ $title }}</span>
        <a class="but" href="{{ action('TicketController@getIndex') }}" >Назад</a>
		<ul class="ncab-ul">
            @foreach($items as $i)
                <li>
                    <div class="ncab-text">
                        <div class="ncab-up">
                            <span class="ncab-up__heading">
								{{ $ar_status[$i->after_status_id] }}
							</span>
                        </div>
                        <span>{{ $i->title }}</span>
                        <p>{{ $i->note }}</p>
                    </div>
                </li>
            @endforeach

        </ul>
	</div>
</div>
@stop
