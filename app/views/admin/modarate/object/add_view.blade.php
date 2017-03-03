@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>action("AdminObjectController@postAddView", $item->id), 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">Накрутка</label>
            <div class="col-md-10">
                {{ Form::text('view_add', (isset($item) ? $item->view_add : null), array('class'=>'form-control ', 'id'=>'view_add', 'required'=>'required')) }}
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
