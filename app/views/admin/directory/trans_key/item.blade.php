@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>$action, 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">Ключ</label>
            <div class="col-md-10">
                {{ Form::text('key', (isset($item) ? $item->key : null), array('class'=>'form-control ', 'id'=>'key', 'required'=>'required')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Строка на русском</label>
            <div class="col-md-10">
                {{ Form::text('name', (isset($item) ? $item->name : null), array('class'=>'form-control ', 'id'=>'name')) }}
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
