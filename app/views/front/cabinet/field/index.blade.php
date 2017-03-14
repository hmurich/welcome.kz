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
					<textarea class='edit-row__input' name='note'>{{ $standart_data->note }}</textarea>
				</div>

			</div>
			<span class="edit-heading">{{ $translator->getTransNameByKey('zaved_photo') }}</span>
			<div class="edit-parts">
				<div class="edit-row">
					<label class="edit-row__label" for="logo">
						{{ $translator->getTransNameByKey('zaved_logo') }}:
					</label>
					<input class="edit-row__input edit-row__input--file" id="logo" name='logo' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_1">
						{{ $translator->getTransNameByKey('zaved_photo_item') }} 1:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_1" name='photo_1' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_2">
						{{ $translator->getTransNameByKey('zaved_photo_item') }} 2:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_2" name='photo_2' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_3">
						{{ $translator->getTransNameByKey('zaved_photo_item') }} 3:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_3" name='photo_3' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_4">
						{{ $translator->getTransNameByKey('zaved_photo_item') }} 4:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_4" name='photo_4' type="file" >
				</div>
				<div class="edit-row">
					<label class="edit-row__label" for="photo_5">
						{{ $translator->getTransNameByKey('zaved_photo_item') }} 5:
					</label>
					<input class="edit-row__input edit-row__input--file" id="photo_5" name='photo_5' type="file" >
				</div>
			</div>
			<button type='submit' class="but" href="#">{{ $translator->getTransNameByKey('zaved_send') }}</button>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop
