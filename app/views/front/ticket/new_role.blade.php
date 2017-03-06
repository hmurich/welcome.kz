@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('TicketController@postNewRole'), 'method' => 'post')) }}
                <span class="vhod__heading">{{ $title }}</span>
                <select name='role[]' class='vhod__input' required=''>
                    <option value="">{{ $translator->getTransNameByKey('select_role'); }}</option>
                    @foreach($ar_roles as $id => $name)
                        <option value="{{ $id }}">{{ $translator->getTransNameByKey(SysCompanyRole::getTransKey($id)); }}</option>
                    @endforeach
                </select>
                <select name='city_id' class='vhod__input'  required=''>
                    <option value="">{{ $translator->getTransNameByKey('select_city'); }}</option>
                    @foreach($ar_city as $id => $name)
                        <option value="{{ $id }}">{{ $translator->getTransNameByKey(SysDirectoryName::getTransKey($id)); }}</option>
                    @endforeach
                </select>
                <input type='text' class='vhod__input' name='name' placeholder="{{ $translator->getTransNameByKey('zaved_title'); }}" value="{{ $company->name }}" required="" />
                <input type='text' class='vhod__input' name='address' placeholder="{{ $translator->getTransNameByKey('zaved_address'); }}" value="{{ $company->address }}" required="" />
                <input type='text' class='vhod__input' name='phone' placeholder="{{ $translator->getTransNameByKey('zaved_phone'); }}" value="{{ $company->phone }}" required="" />
                <textarea class='vhod__textarea' name='note' placeholder="{{ $translator->getTransNameByKey('zaved_note'); }}">{{ $company->note }}</textarea>
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">{{ $translator->getTransNameByKey('ticket_send'); }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
