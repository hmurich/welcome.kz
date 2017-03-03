@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('TicketController@postNewEvent'), 'method' => 'post', 'files'=>true)) }}
                <span class="vhod__heading">{{ $title }}</span>
                <select name='object_id' class='vhod__input' placeholder="Выберите роль" required=''>
                    <option value="">Выберите заведение</option>
                    @foreach($objects as $o)
                        <option value="{{ $o->id }}">{{ $o->name }}</option>
                    @endforeach
                </select>
                <input type='text' class='vhod__input' name='title' placeholder="Заголовок" required="" />
                <input type='date' class='vhod__input' name='date_event' placeholder="Дата события" required="" />
                <input type='time' class='vhod__input' name='time_event' placeholder="Время события" required="" />
                <input type='text' class='vhod__input' name='duration' placeholder="Продожительность"  required="" />
                <input type='file' class='vhod__input' name='image' required="" />
                <textarea class='vhod__input' name='note' placeholder="Описание"></textarea>
                
                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">Отправить запрос</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
