@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')

<div class="main-part" id="content">
	<div class="main-part__inner">
		<div class="content-part">
			{{ Form::open(array('url'=>action('CabinetFieldController@postIndex', $object->id), 'method' => 'post', 'files'=> true)) }}
			<div class="zaved-up">
				<div class="mob-start mob-start--add">
            <span></span>
            <span></span>
            <span></span>     
        </div>
				<span class="h-heading">{{ $title }}</span>
			</div>
			<div class="edit-parts">
				<div class="edit-row">
					<label class="edit-row__label" for="name">
						Название заведения:
					</label>
					<input class="edit-row__input" id="name" name='name' type="text" value='{{ $object->name }}'>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="slogan">
						Слоган:
					</label>
					<input class="edit-row__input" id="slogan" name='slogan' type="text" value='{{ $standart_data->slogan }}'>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="address">
						Адрес:
					</label>
					<input class="edit-row__input" id="address" name='address' type="text" value='{{ $standart_data->address }}'>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="phone">
						Телефоны:
					</label>
					<input class="edit-row__input" id="phone" name='phone' type="text" value='{{ $standart_data->phone }}'>
				</div>
				@foreach($sys_special_data as $s)
					<div class="edit-row">
						<label class="edit-row__label" for="{{ $s->relFilter->spec_key }}">
							{{ $s->relFilter->name }}:
						</label>
						@include('front.cabinet.field.include.special_field')
					</div>
				@endforeach
			</div>
			<span class="edit-heading">Фоторафии</span>
			<div class="edit-parts">
				<div class="edit-row">
					<label class="edit-row__label" for="logo">
						Логотип:
					</label>
					<input class="edit-row__input edit-row__input--file" id="logo" name='logo' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_1">
						Фото 1:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_1" name='photo_1' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_2">
						Фото 2:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_2" name='photo_2' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_3">
						Фото 3:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_3" name='photo_3' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_4">
						Фото 4:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_4" name='photo_4' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_5">
						Фото 5:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_5" name='photo_5' type="file" >
				</div>
			</div>
			<button type='submit' class="but" href="#">Сохранить</button>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop
