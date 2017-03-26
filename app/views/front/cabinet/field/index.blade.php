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
						{{ $translator->getTransNameByKey('zaved_title') }}:
					</label>
					<input class="edit-row__input" id="name" name='name' type="text" value='{{ $object->name }}'>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="city_id">
						{{ $translator->getTransNameByKey('select_city'); }}:
					</label>
					<select class="edit-row__input" name='city_id' required>
				        @foreach ($ar_city as $k=>$v)
				            @if ($k == $object->city_id)
				                <option value="{{ $k }}" selected="selected">{{ $v }}</option>
				            @else
				                <option value="{{ $k }}">{{ $translator->getTransNameByKey(SysDirectoryName::getTransKey($k)); }}</option>
				            @endif
				        @endforeach
				    </select>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="name">
						{{ $translator->getTransNameByKey('zaved_time_b') }}:
					</label>
					<input class="edit-row__input" id="begin_time" name='begin_time' type="time" value='{{ $standart_data->begin_time }}'>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="name">
						{{ $translator->getTransNameByKey('zaved_time_e') }}:
					</label>
					<input class="edit-row__input" id="end_time" name='end_time' type="time" value='{{ $standart_data->end_time }}'>
				</div>


				<div class="edit-row">
					<label class="edit-row__label" for="slogan">
						{{ $translator->getTransNameByKey('zaved_slogan') }}:
					</label>
					<input class="edit-row__input" id="slogan" name='slogan' type="text" value='{{ $standart_data->slogan }}'>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="address">
						{{ $translator->getTransNameByKey('zaved_address') }}:
					</label>
					<input class="edit-row__input" id="address" name='address' type="text" value='{{ $standart_data->address }}'>
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="phone">
						{{ $translator->getTransNameByKey('zaved_phone') }}:
					</label>
					<input class="edit-row__input" id="phone" name='phone' type="text" value='{{ $standart_data->phone }}'>
				</div>
				@foreach($sys_special_data as $s)
					<div class="edit-row">
						<label class="edit-row__label" for="{{ $s->relFilter->spec_key }}">
							{{ $translator->getTransNameByKey(SysFilter::getTransKey($s->relFilter->id)) }}:
						</label>
						@include('front.cabinet.field.include.special_field')
					</div>
				@endforeach
				<div class="edit-row">
					<label class="edit-row__label" for="phone">
						{{ $translator->getTransNameByKey('zaved_note') }}:
					</label>
					<textarea class='edit-row__textarea' name='note'>{{ $standart_data->note }}</textarea>
				</div>

			</div>
			<span class="edit-heading">Логотип и фотография в каталог</span>
			<ul class="photo-ul">
				<li>
					<div class="d-photo">
						@if ($standart_data->logo)
							<img src="{{ $standart_data->logo }}" class="d-photo__file" />
							<input type="file" name='logo' style='display:none' id='logo_uplload'>
						@else
							<input class="d-photo__file" type="file" name='logo' id='logo_uplload'>
						@endif
						<button class="d-photo__submit js_upload_logo" data-id='logo_uplload' type="button" >
							Загрузить логотип
						</button>
						@if ($standart_data->logo)
							<a href='{{ action("CabinetFieldController@getDeleteImg", array('logo', $object->id)) }}'>
								<button class="d-photo__submit d-photo__submit--delete" type="button">
									Удалить фотографию
								</button>
							</a>
						@endif
					</div>
				</li>
				<li>
					<div class="d-photo">
						@if ($standart_data->logo_catalog)
							<img src="{{ $standart_data->logo_catalog }}" class="d-photo__file" />
							<input type="file" name='logo_catalog' style='display:none' id='logo_catalog'>
						@else
							<input class="d-photo__file" type="file" name='logo_catalog' id='logo_catalog'>
						@endif
						<button class="d-photo__submit js_upload_logo" data-id='logo_catalog'  type="button">
							Фотография в каталог
						</button>
						@if ($standart_data->logo_catalog)
							<a href='{{ action("CabinetFieldController@getDeleteImg", array('logo_catalog', $object->id)) }}'>
								<button class="d-photo__submit d-photo__submit--delete" type="button">
									Удалить фотографию
								</button>
							</a>
						@endif
					</div>
				</li>
			</ul>
			<span class="edit-heading">Слайдер</span>
			<ul class="photo-ul">
				<li>
					<div class="d-photo">
						@if ($photo_1)
							<img src="{{ $photo_1->image }}" class="d-photo__file" />
							<input type="file" name='photo_1' style='display:none' id='photo_1'>
						@else
							<input class="d-photo__file" type="file" name='photo_1' id='photo_1'>
						@endif
						<button class="d-photo__submit js_upload_logo" data-id='photo_1' type="button">
							Загрузить фотографию
						</button>
						@if ($photo_1)
							<a href='{{ action("CabinetFieldController@getDeleteImg", array('photo_1', $object->id)) }}'>
								<button class="d-photo__submit d-photo__submit--delete" type="button">
									Удалить фотографию
								</button>
							</a>
						@endif
					</div>
				</li>
				<li>
					<div class="d-photo">
						@if ($photo_2)
							<img src="{{ $photo_2->image }}" class="d-photo__file" />
							<input type="file" name='photo_2' style='display:none' id='photo_2'>
						@else
							<input class="d-photo__file" type="file" name='photo_2' id='photo_2'>
						@endif
						<button class="d-photo__submit js_upload_logo" data-id='photo_2' type="button">
							Загрузить фотографию
						</button>
						@if ($photo_2)
							<a href='{{ action("CabinetFieldController@getDeleteImg", array('photo_2', $object->id)) }}'>
								<button class="d-photo__submit d-photo__submit--delete" type="button">
									Удалить фотографию
								</button>
							</a>
						@endif
					</div>
				</li>
				<li>
					<div class="d-photo">
						@if ($photo_3)
							<img src="{{ $photo_3->image }}" class="d-photo__file" />
							<input type="file" name='photo_3' style='display:none' id='photo_3'>
						@else
							<input class="d-photo__file" type="file" name='photo_3' id='photo_3'>
						@endif
						<button class="d-photo__submit js_upload_logo" data-id='photo_3' type="button">
							Загрузить фотографию
						</button>
						@if ($photo_3)
							<a href='{{ action("CabinetFieldController@getDeleteImg", array('photo_3', $object->id)) }}'>
								<button class="d-photo__submit d-photo__submit--delete" type="button">
									Удалить фотографию
								</button>
							</a>
						@endif
					</div>
				</li>
				<li>
					<div class="d-photo">
						@if ($photo_4)
							<img src="{{ $photo_4->image }}" class="d-photo__file" />
							<input type="file" name='photo_4' style='display:none' id='photo_4'>
						@else
							<input class="d-photo__file" type="file" name='photo_4' id='photo_4'>
						@endif
						<button class="d-photo__submit js_upload_logo" data-id='photo_4' type="button">
							Загрузить фотографию
						</button>
						@if ($photo_4)
							<a href='{{ action("CabinetFieldController@getDeleteImg", array('photo_4', $object->id)) }}'>
								<button class="d-photo__submit d-photo__submit--delete" type="button">
									Удалить фотографию
								</button>
							</a>
						@endif
					</div>
				</li>
			</ul>
			<button type='submit' class="but" href="#">{{ $translator->getTransNameByKey('zaved_send') }}</button>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop
