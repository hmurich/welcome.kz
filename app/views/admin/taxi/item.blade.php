@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>$action, 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">Наименование</label>
            <div class="col-md-10">
                {{ Form::text('name', (isset($item) ? $item->name : null), array('class'=>'form-control ', 'id'=>'name', 'required'=>'required')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Телефон</label>
            <div class="col-md-10">
                {{ Form::text('phone', (isset($item) ? $item->phone : null), array('class'=>'form-control ', 'id'=>'phone')) }}
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
