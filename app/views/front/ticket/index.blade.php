@extends('front.layout')
@section('content')
<div class="main-part__inner">
	<div class="content-part">
		<span class="h-heading">{{ $title }}</span>
		<a class="but" href="{{ action('TicketController@getAdd') }}">Добавить новость</a>
        <a class="but" href="{{ action('CabinetController@getIndex') }}" style='float: right;'>В кабинет</a>
		<ul class="ncab-ul">
            @foreach($items as $i)
                <li>
                    <a class="ncab-img" href="#">
                        {{ $ar_status[$i->status_id] }}
                    </a>
                    <div class="ncab-text">
                        <div class="ncab-up">
                            <span class="ncab-up__heading">
								{{ $ar_cats[$i->cat_id] }}
							</span>
                            <a href='{{ action('TicketController@getHistory', $i->id) }}' class='ncab-up__edit ncab-up__edit--delete'>
                                История
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
