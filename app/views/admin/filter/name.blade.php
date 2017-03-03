@extends('admin.layout')

@section('content')
{{ Form::open(array('url'=>action('AdminFilterController@postName', $filter->id), 'method' => 'post', 'role'=>'form')) }}
    <div class="form-group">
        <label class="col-md-2 control-label">Вариант</label>
        <div class="col-md-10">
            {{ Form::text('name', (isset($item) ? $item->name : null), array('class'=>'form-control ', 'id'=>'name')) }}
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
                <td>{{ $i->name }}</td>
                <td><a href='{{ action('AdminFilterController@getDeleteName', array($i->id)) }}'>Удалить</a></td>
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
