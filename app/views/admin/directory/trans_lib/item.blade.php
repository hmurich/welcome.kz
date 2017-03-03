@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>$action, 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">{{ $lang->name }}</label>
            <div class="col-md-10">
                {{ Form::text('trans_name', (isset($item) ? $item->trans_name : null), array('class'=>'form-control ', 'id'=>'trans_name')) }}
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
