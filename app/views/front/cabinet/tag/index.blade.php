@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
            {{ Form::open(array('url'=>action('CabinetTagController@postIndex', $object->id), 'method' => 'post')) }}
			<span class="h-heading">{{ $title }}</span>
			<div class="edit-parts">
				<div class="edit-textarea">
					<label class="edit-textarea__label" for="">
						{{ $translator->getTransNameByKey('tag_note_title') }}:
					</label>
					<textarea class="edit-textarea__textarea" id="note" name='note' type="text" placeholder="{{ $translator->getTransNameByKey('tag_note_placeholder') }}">{{ $tag->note }}</textarea>
				</div>
			</div>
			<button class="but" type="submit">{{ $translator->getTransNameByKey('tag_send') }}</button>
            {{ Form::close() }}
		</div>
	</div>
</div>

@stop
