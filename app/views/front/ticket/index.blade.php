@extends('front.layout')
@section('content')
<div class="main-part__inner">
	<div class="content-part">
		<span class="h-heading">{{ $title }}</span>
		<a class="but" href="{{ action('TicketController@getAdd') }}">{{ $translator->getTransNameByKey('add_ticket'); }} </a>
        <a class="but" href="{{ action('CabinetController@getIndex') }}" style='float: right;'>{{ $translator->getTransNameByKey('back_to_cabinet'); }} </a>
		<ul class="ticket-ul">
            @foreach($items as $i)
                <li>
                    <div class="ticket-part">
                        <a class="ticket-status" href="#">
                            {{ $ar_status[$i->status_id] }}
                        </a>
                        <div class="ncab-up">
                            <span class="ncab-up__heading">
								{{ $ar_cats[$i->cat_id] }}
							</span>
                            <a href='{{ action('TicketController@getHistory', $i->id) }}' class='ncab-up__edit ncab-up__edit--delete'>
                                {{ $translator->getTransNameByKey('history_cabinet'); }}
                            </a>
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
