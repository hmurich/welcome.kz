@extends('admin.layout')

@section('content')
{{ Form::open(array('url'=>action('AdminFilterController@postCat', $filter->id), 'method' => 'post', 'role'=>'form')) }}
    <div class="form-group">
        <label class="col-md-2 control-label">Роль</label>
        <div class="col-md-10">
            {{ Form::select('cat_id', $ar_cat, null , array('class'=>'form-control normalValidate')) }}
         </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
<br />

<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Наименование</th>
            <th style="width: 40px">
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $ar_cat[$i->cat_id] }}</td>
                <td><a href='{{ action('AdminFilterController@getDeleteCat', array($i->id)) }}'>Удалить</a></td>
            </tr>
        @endforeach
    </tbody>
	<tfoot>
		<tr>
			<td colspan=12>{{ $items->appends(Input::all())->links() }}</td>
		</tr>
	<tfoot>
</table>

@stop
