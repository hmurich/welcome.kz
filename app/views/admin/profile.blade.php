@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>action('AdminController@postProfile'), 'method' => 'post', 'role'=>'form')) }}
        <div class="box-body">
            <div class="form-group">
                <label for="email">Email </label>
                {{ Form::text('email', $user->email, array('class'=>'form-control normalValidate', 'id'=>'email', 'required'=>'required')) }}
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                {{  Form::password('password', array('class'=>'form-control normalValidate', 'id'=>'password')) }}
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    {{ Form::close() }}
@stop
