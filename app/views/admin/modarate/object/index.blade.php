@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Город</th>
            <th>Роль</th>
            <th>Наименование</th>
            <th>Кол-во просмотров</th>
            <th>Надбавка</th>
            <th>Email</th>
            <th>Адресс</th>
            <th>Телефон</th>
            <th>Такси</th>
            <th>Создан</th>
            <th style="width: 40px"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $ar_city[$i->city_id] }}</td>
                <td>{{ $ar_role[$i->role_id] }}</td>
                <td>{{ $i->name }}</td>

                <td>{{ $i->view_total }}</td>
                <td>{{ $i->view_add }}</td>

                <td>{{ $i->relUser->email }}</td>
                <td>{{ $i->relStandartData->address }}</td>
                <td>{{ $i->relStandartData->phone }}</td>
                <td>
                    @if (isset($ar_taxi[$i->taxi_id]))
                        {{ $ar_taxi[$i->taxi_id] }}
                    @else
                        нет
                    @endif
                </td>
                <td>{{ $i->created_at }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href='{{ action('ObjectController@getIndex', array($i->id)) }}' target="_blank">Просмотр</a></li>
                            <li><a href='{{ action('AdminObjectController@getTaxi', array($i->id)) }}'>Такси</a></li>

							<li><a href='{{ action('AdminObjectController@getAddView', array($i->id)) }}'>Накрутка</a></li>
                            @if ($status_id  == 1)
                                <li><a href='{{ action('AdminObjectController@getAccept', array($i->id)) }}'>Одобрить</a></li>
                            @else
                                <li><a href='{{ action('AdminObjectController@getClose', array($i->id)) }}'>Вернуть на проверку</a></li>
                            @endif
                            <li><a href='{{ action('AdminObjectController@getDelete', array($i->id)) }}'>Удалить</a></a></li>
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
