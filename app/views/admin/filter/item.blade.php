@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>$action, 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">Системный код</label>
            <div class="col-md-10">
                {{ Form::text('spec_key', (isset($item) ? $item->spec_key : null), array('class'=>'form-control ', 'id'=>'spec_key', 'required'=>'required')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Индекс сортировки</label>
            <div class="col-md-10">
                {{ Form::text('sort_index', (isset($item) ? $item->sort_index : null), array('class'=>'form-control ', 'id'=>'sort_index', 'required'=>'required')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Наименование</label>
            <div class="col-md-10">
                {{ Form::text('name', (isset($item) ? $item->name : null), array('class'=>'form-control ', 'id'=>'name')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Тип</label>
            <div class="col-md-10">
                {{ Form::select('type_id', $ar_type, (isset($item) ? $item->type_id : null), array('class'=>'form-control normalValidate', 'id'=>'type_id')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Множественный</label>
            <div class="col-md-10">
                {{ Form::select('is_many', array(0=>'единственный', 1=>'множественный'), (isset($item) ? $item->is_many : null) , array('class'=>'form-control normalValidate', 'id'=>'is_many')) }}
             </div>
        </div>
        <div class="form-group">
            <label class="col-md-6 control-label">Значения( при фиксированном, пользователь должен  выирать из имеющихся вариантов)</label>
            <div class="col-md-6">
                {{ Form::select('is_fixed', array(0=>'любой', 1=>'фиксированный'), (isset($item) ? $item->is_fixed : null) , array('class'=>'form-control normalValidate', 'id'=>'is_fixed')) }}
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
