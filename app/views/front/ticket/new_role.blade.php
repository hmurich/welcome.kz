@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('TicketController@postNewRole'), 'method' => 'post')) }}
                <span class="vhod__heading">{{ $title }}</span>
                <select name='role[]' class='vhod__input' placeholder="Выберите роль" required=''>
                    <option value="">Выберите роль</option>
                    @foreach($ar_roles as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <select name='city_id' class='vhod__input' placeholder="Выберите город" required=''>
                    <option value="">Выберите город</option>
                    @foreach($ar_city as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <input type='text' class='vhod__input' name='name' placeholder="Наименование заведения" value="{{ $company->name }}" required="" />
                <input type='text' class='vhod__input' name='address' placeholder="Адресс" value="{{ $company->address }}" required="" />
                <input type='text' class='vhod__input' name='phone' placeholder="Телефон" value="{{ $company->phone }}" required="" />
                <textarea class='vhod__input' name='note' placeholder="Описание">{{ $company->note }}</textarea>

                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">Отправить запрос</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
