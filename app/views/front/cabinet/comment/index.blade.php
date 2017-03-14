@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
			<div class="zaved-up">
                <div class="mob-start mob-start--add">
                    <span></span>
                    <span></span>
                    <span></span>     
                </div>
                <span class="h-heading">{{ $title }}</span>
            </div>    
            <ul class="otzyv-ul">
                @foreach ($comments as $c)
                    <li>
                        <div class="otzyv">
                            <div class="otzyv-up">
                                <span class="otzyv-up__name">{{ $c->title }}</span>
                                <span class="otzyv-up__date">{{ $c->created_at }}</span>
                                <div class="rating otzyv-up__rating">
                                    <a href='{{ action("CabinetCommentController@getIsPublish", array($object->id, $c->id)) }}' class="rating__text">
                                        @if ($c->is_publish)
                                            Скрыть
                                        @else
                                            Опубликовать
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <span class="otzyv__text">
                                {{ $c->note }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
	</div>
</div>
@stop
