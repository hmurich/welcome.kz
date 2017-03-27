@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('TicketController@postAdd'), 'method' => 'post')) }}
                <span class="vhod__heading">{{ $title }}</span>
                <select name='cat_id' class='vhod__input' placeholder="{{ $translator->getTransNameByKey('select_ticket'); }}" required=''>
                    <option >{{ $translator->getTransNameByKey('select_ticket'); }}</option>
                    @foreach($ar_cats as $id => $name)
                        <option value="{{ $id }}">{{ $translator->getTransNameByKey(SysDirectoryName::getTransKey($id)); }}</option>
                    @endforeach
                </select>
                <input type='text' class='vhod__input' name='title' placeholder="{{ $translator->getTransNameByKey('ticket_title'); }}"  required="" />
                <textarea class='vhod__textarea' name='note' placeholder="{{ $translator->getTransNameByKey('ticket_note'); }}" required=""></textarea>
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">{{ $translator->getTransNameByKey('ticket_send'); }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
