@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>$action, 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">ФИО</label>
            <div class="col-md-10">
                {{ Form::text('name', (isset($item) ? $item->name : null), array('class'=>'form-control ', 'id'=>'name', 'required'=>'required')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Email</label>
            <div class="col-md-10">
                <input class="form-control " id="email" required="required" name="email" type="email" value="{{ (isset($user) ? $user->email : null) }}">
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Пароль</label>
            <div class="col-md-10">
                {{ Form::text('password', (isset($item) ? $item->password : null), array('class'=>'form-control ', 'id'=>'password', 'required'=>'required')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Адресс</label>
            <div class="col-md-10">
                {{ Form::text('address', (isset($item) ? $item->address : null), array('class'=>'form-control ', 'id'=>'address')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Телефон</label>
            <div class="col-md-10">
                    {{ Form::text('phone', (isset($item) ? $item->phone : null), array('class'=>'form-control ', 'id'=>'phone')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Заметка</label>
            <div class="col-md-10">
                {{ Form::textarea('note', (isset($item) ? $item->note : null), array('class'=>'form-control ', 'id'=>'note')) }}
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
