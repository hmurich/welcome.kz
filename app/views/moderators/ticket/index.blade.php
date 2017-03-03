@extends('moderators.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Тема</th>
            <th><a href='{{ AdminBaseController::generateDetailSortUral("name") }}'>Заголовок</a></th>
            <th>Описание</th>
            <th>Статус</th>
            <th>Имя отправителя</th>
            <th>Email отправителя</th>
            <th>Создан</th>
            <th>Изменен</th>
            <th style="width: 40px">
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $ar_topic[$i->cat_id] }}</td>
                <td>{{ $i->title }}</td>
                <td>{{ $i->note }}</td>
                <td>{{ $ar_status[$i->status_id] }}</td>
                <td>{{ $i->relUser->name }}</td>
                <td>{{ $i->relUser->email }}</td>
                <td>{{ $i->created_at }}</td>
                <td>{{ $i->updated_at }}</td>
                <td>
                    <a href='{{ action('ModeratorTicketController@getHistory', array($i->status_id, $i->id)) }}'>История</a>
                </td>
                <td>
                    <a href='{{ action('ModeratorTicketController@getItem', array($i->status_id, $i->id)) }}'>Ответить</a>
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
