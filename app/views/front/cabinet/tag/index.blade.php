@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part" id="content">
	<div class="main-part__inner">
		<div class="content-part">
            {{ Form::open(array('url'=>action('CabinetTagController@postIndex', $object->id), 'method' => 'post')) }}			
     <div class="zaved-up">
				<div class="mob-start mob-start--add">
            <span></span>
            <span></span>
            <span></span>     
        </div>   
        <span class="h-heading">{{ $title }}</span>
     </div>      			   
			<div class="edit-parts">
				<div class="edit-textarea">
					<label class="edit-textarea__label" for="">
						Тэги:
					</label>
					<textarea class="edit-textarea__textarea" id="note" name='note' type="text" placeholder="Введите тэги через запятую">{{ $tag->note }}</textarea>					
				</div>
				<button class="but" type="submit">Сохранить</button>
			</div>
			
            {{ Form::close() }}
		</div>
	</div>
</div>

@stop
