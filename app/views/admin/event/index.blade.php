@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Лого</th>
            <th>Заголовок собятия</th>
            <th>Дата </th>
            <th>Время </th>
            <th>Продолжительность </th>
            <th>Описание</th>
            <th>Заведение</th>
            <th>Email</th>
            <th>Создан</th>
            <th style="width: 40px"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>
                    @if ($i->image)
                        <a href='{{ $i->image }}' target="_blank" >
                            <img src="{{ $i->image }}" style='width: 100px;'>
                        </a>
                    @else
                        отсутствует
                    @endif
                </td>
                <td>{{ $i->title }}</td>
                <td>{{ $i->date_event }}</td>
                <td>{{ $i->time_event }}</td>
                <td>{{ $i->duration }}</td>
                <td>{{ $i->note }}</td>

                <td>{{ $i->relObject->name }}</td>
                <td>{{ $i->relObject->relUser->email }}</td>
                <td>{{ $i->created_at }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href='{{ action('AdminEventController@getIsActive', array($i->id)) }}'>
                                @if ($i->is_active)
                                    Отправить на проверку
                                @else
                                    Одобрить
                                @endif
                            </a></li>
                            <li><a href='{{ action('AdminEventController@getDelete', array($i->id)) }}'>Удалить</a></a></li>
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
