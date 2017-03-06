@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
			<div class="up-heading">
                <span class="up-heading__heading">{{ $title }}</span>
			    <a class="but" href="{{ action('CabinetNewsController@getAdd', $object->id) }}">Добавить новость</a>
            </div>
			<ul class="ncab-ul">
                @foreach ($news as $n)
                    <li>
                        <span class="ncab-img" href="#" style='max-width: 9%;'>
                            <img src="{{ $n->image }}" style='width: 100%;'>
                        </span>
                        <div class="ncab-text">
                            <div class="ncab-up">
                                <a href="{{ action("CabinetNewsController@getAdd", array($object->id, $n->id)) }}" class="ncab-up__heading">
                                    {{ $n->title }}
                                </a>
                                <a href='{{ action("CabinetNewsController@getAdd", array($object->id, $n->id)) }}' class="ncab-up__edit ncab-up__edit--edit">
                                    Редактировать новость
                                </a>
                                <a href='{{ action("CabinetNewsController@getDelete", array($object->id, $n->id)) }}' class="ncab-up__edit ncab-up__edit--delete">
                                    Удалить новость
                                </a>
                            </div>
                            {{ $n->note }}
                        </div>
                    </li>
                @endforeach
            </ul>
		</div>
	</div>
</div>

@stop
