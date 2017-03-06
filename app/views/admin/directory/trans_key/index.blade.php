@extends('admin.layout')

@section('content')
{{ Form::open(array('url'=>'#filter', 'method' => 'get', 'role'=>'form')) }}
    <div class="form-group">
        <label class="col-md-2 control-label">Ключ</label>
        <div class="col-md-10">
            {{ Form::text('filter[key]', Input::get('filter.key'), array('class'=>'form-control ')) }}
         </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Строка на русском</label>
        <div class="col-md-10">
            {{ Form::text('filter[name]', Input::get('filter.name'), array('class'=>'form-control ')) }}
         </div>
    </div>
    <button type="submit" class="btn btn-primary">Отфильтровать</button>
{{ Form::close() }}

<br />
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Ключ</th>
            <th>Строка на русском</th>
            <th style="width: 40px">
                <a href='{{ action('AdminTransKeyContrroller@getItem') }}'>Создать</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->key }}</td>
                <td>{{ $i->name }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href='{{ action('AdminTransKeyContrroller@getItem', array($i->id)) }}'>Изменить</a></li>
                            <li><a href='{{ action('AdminTransKeyContrroller@getDelete', array($i->id)) }}'>Удалить</a></li>
						</ul>
					</div>
                </td>
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
