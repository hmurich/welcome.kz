@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
			<span class="h-heading">{{ $title }}</span>
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
