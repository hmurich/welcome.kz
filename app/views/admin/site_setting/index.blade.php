@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>action('AdminSiteSettingController@postIndex'), 'method' => 'post', 'role'=>'form')) }}
        @foreach($ar_value as $key=>$value)
            <div class="form-group">
                <label class="col-md-2 control-label">{{ (isset($ar_titles[$key]) ? $ar_titles[$key] : 'Заголовок не найден') }}</label>
                <div class="col-md-10">
                    {{ Form::text('ar['.$key.']', $value, array('class'=>'form-control', 'required'=>'required')) }}
                 </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
