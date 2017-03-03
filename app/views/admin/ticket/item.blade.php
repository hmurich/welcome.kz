@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>$action, 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">Категоря</label>
            <div class="col-md-10">
                {{ Form::select('status_id', $ar_status, $item->status_id, array('class'=>'form-control normalValidate', 'id'=>'status_id')) }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Текст ответа</label>
            <div class="col-md-10">
                {{ Form::textarea('note', null, array('class'=>'form-control ', 'id'=>'note')) }}
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
