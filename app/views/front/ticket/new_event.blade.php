@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('TicketController@postNewEvent'), 'method' => 'post', 'files'=>true)) }}
                <span class="vhod__heading">{{ $title }}</span>
                <select name='object_id' class='vhod__input' required=''>
                    <option value="">{{ $translator->getTransNameByKey('select_zaved'); }}</option>
                    @foreach($objects as $o)
                        <option value="{{ $o->id }}">{{ $o->name }}</option>
                    @endforeach
                </select>
                <input type='text' class='vhod__input' name='title' placeholder="{{ $translator->getTransNameByKey('event_title') }}" required="" />
                <input type='date' class='vhod__input' name='date_event' placeholder="{{ $translator->getTransNameByKey('event_date') }}" required="" />
                <input type='time' class='vhod__input' name='time_event' placeholder="{{ $translator->getTransNameByKey('event_time') }}" required="" />
                <input type='text' class='vhod__input' name='duration' placeholder="{{ $translator->getTransNameByKey('event_duration') }}"  required="" />
                <input type='file' class='vhod__input' name='image' required="" />
                <textarea class='vhod__input' name='note' placeholder="{{ $translator->getTransNameByKey('event_note') }}"></textarea>

                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">{{ $translator->getTransNameByKey('ticket_send') }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
