@extends('admin.layout')

@section('content')
{{ Form::open(array('url'=>action('AdminFilterController@postRole', $filter->id), 'method' => 'post', 'role'=>'form')) }}
    <div class="form-group">
        <label class="col-md-2 control-label">Роль</label>
        <div class="col-md-10">
            {{ Form::select('role_id', $ar_role, null , array('class'=>'form-control normalValidate')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Показать в фильтрах</label>
        <div class="col-md-10">
            {{ Form::select('show_filter', $ar_show, null , array('class'=>'form-control normalValidate')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Индекс сортировки</label>
        <div class="col-md-10">
            <input type='number' name='sort_index' class='form-control normalValidate' value='0'>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
<br />

<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Индекс сортировки</th>
            <th>Наименование</th>
            <th>Показать в фильтре</th>
            <th style="width: 40px">
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->sort_index }}</td>
                <td>{{ $ar_role[$i->role_id] }}</td>
                <td>{{ $ar_show[$i->show_filter] }}</td>
                <td><a href='{{ action('AdminFilterController@getDeleteRole', array($i->id)) }}'>Удалить</a></td>
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
