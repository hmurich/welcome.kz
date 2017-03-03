@extends('front.layout')
@section('content')
<div class="wrapper">
    <div class="vhod-part">
        <div class="vhod">
            {{ Form::open(array('url'=>action('TicketController@postAdd'), 'method' => 'post')) }}
                <span class="vhod__heading">{{ $title }}</span>
                <select name='cat_id' class='vhod__input' placeholder="Выберите роль" required=''>
                    <option >Выберите тему</option>
                    @foreach($ar_cats as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <input type='text' class='vhod__input' name='title' placeholder="Тема"  required="" />
                <textarea class='vhod__input' name='note' placeholder="Описание" required=""></textarea>

                <div class="vhod-but">
                    <button class="but vhod-but__left" type="submit">Отправить запрос</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
