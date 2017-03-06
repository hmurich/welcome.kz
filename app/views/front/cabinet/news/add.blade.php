@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
            {{ Form::open(array('url'=>$action, 'method' => 'post', 'files'=> true)) }}
			<span class="h-heading">{{ $title }}</span>
			<div class="edit-parts">
				<div class="edit-row">
					<label class="edit-row__label" for="title">
						{{ $translator->getTransNameByKey('news_title') }}:
					</label>
					<input class="edit-row__input" id="title" name='title' type="text" placeholder="{{ $translator->getTransNameByKey('news_title') }}" value="{{ ($news ? $news->title : null) }}">
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="image">
						{{ $translator->getTransNameByKey('news_photo') }}:
					</label>
					<input class="edit-row__input" id="image" name='image' type="file" required="">
				</div>
				<div class="edit-textarea">
					<label class="edit-textarea__label" for="">
						{{ $translator->getTransNameByKey('news_note') }}:
					</label>
					<textarea class="edit-textarea__textarea" id="note" name='note' type="text" placeholder="{{ $translator->getTransNameByKey('news_note') }}">{{ ($news ? $news->note : null) }}</textarea>
				</div>
			</div>
			<button class="but" type="submit">{{ $translator->getTransNameByKey('news_send') }}</button>
            {{ Form::close() }}
		</div>
	</div>
</div>

@stop
