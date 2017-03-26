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
                        <span class="ticket-part__heading">
							{{ $ar_cats[$i->cat_id] }}
						</span>
                        <div class="ticket-status" href="#">
                            <span class="ticket-status__name">Статус:</span>
                            <span class="ticket-status__type">{{ $ar_status[$i->status_id] }}</span>
                        </div>   
                         <a href='{{ action('TicketController@getHistory', $i->id) }}' class='ticket-history'>
                                {{ $translator->getTransNameByKey('history_cabinet'); }}
                        </a>                        
                        <div class="ticket-status" href="#">
                            <span class="ticket-status__name">Тема:</span>
                            <span class="ticket-status__type">{{ $i->title }}</span>
                        </div>  
                        <p class="ticket__des">{{ $i->note }}</p>
                    </div>
                </li>
            @endforeach

        </ul>
	</div>
</div>
@stop
