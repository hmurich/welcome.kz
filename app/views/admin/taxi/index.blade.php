@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Наименование</th>
            <th>Телефон</th>
            <th>Создан</th>
            <th>Изменен</th>
            <th style="width: 40px">
                <a href='{{ action('AdminTaxiController@getItem') }}'>Создать</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->name }}</td>
                <td>{{ $i->phone }}</td>
                <td>{{ $i->created_at }}</td>
                <td>{{ $i->updated_at }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href='{{ action('AdminTaxiController@getItem', array($i->id)) }}'>Изменить</a></li>
							<li><a href='{{ action('AdminTaxiController@getDelete', array($i->id)) }}'>Удалить</a></a></li>
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
