@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>$action, 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">Наименование</label>
            <div class="col-md-10">
                {{ Form::text('name', (isset($item) ? $item->name : null), array('class'=>'form-control ', 'id'=>'name', 'required'=>'required')) }}
             </div>
        </div>
        @if (!isset($item))
            <div class="form-group">
                <label class="col-md-2 control-label">Можна ли удалять элементы</label>
                <div class="col-md-10">
                    {{ Form::select('can_delete', array(0=>'Нет', 1=>'Да'), 0, array('class'=>'form-control normalValidate', 'id'=>'can_delete')) }}
                </div>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
