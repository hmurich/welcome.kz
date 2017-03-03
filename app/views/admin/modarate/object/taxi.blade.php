@extends('admin.layout')
@section('content')
    {{ Form::open(array('url'=>action('AdminObjectController@postTaxi', $item->id), 'method' => 'post', 'role'=>'form')) }}
        <div class="form-group">
            <label class="col-md-2 control-label">Такси</label>
            <div class="col-md-10">
                {{ Form::select('taxi_id',  $ar_taxi, $item->taxi_id, array('class'=>'form-control normalValidate')) }}
             </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {{ Form::close() }}
@stop
