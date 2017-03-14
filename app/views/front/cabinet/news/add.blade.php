@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
            {{ Form::open(array('url'=>$action, 'method' => 'post', 'files'=> true)) }}
			<div class="up-heading">
        <div class="mob-start mob-start--news">
            <span></span>
            <span></span>
            <span></span>     
        </div>
				<span class="h-heading">{{ $title }}</span>
			</div>		
			<div class="edit-parts">
				<div class="edit-row">
					<label class="edit-row__label" for="title">
						Заголовок:
					</label>
					<input class="edit-row__input" id="title" name='title' type="text" placeholder="Название заведения" value="{{ ($news ? $news->title : null) }}">
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="image">
						Фото:
					</label>
					<input class="edit-row__input" id="image" name='image' type="file" required="">
				</div>
				<div class="edit-textarea">
					<label class="edit-textarea__label" for="">
						Текст новости:
					</label>
					<textarea class="edit-textarea__textarea" id="note" name='note' type="text" placeholder="Текст новости">{{ ($news ? $news->note : null) }}</textarea>
				</div>
			</div>
			<button class="but" type="submit">Сохранить</button>
            {{ Form::close() }}
		</div>
	</div>
</div>

@stop
