@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th><a href='{{ AdminBaseController::generateDetailSortUral("name") }}'>Наименование</a></th>
            <th>Системное имя</th>
            <th style="width: 40px">
                <a href='{{ action('AdminDirectoryController@getItem', $parent->id) }}'>Создать</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->name }}</td>
                <td>{{ $i->sys_name }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href='{{ action('AdminDirectoryController@getItem', array($parent->id, $i->id)) }}'>Изменить</a></li>
                            @if ($parent->can_delete)
    							<li><a href='{{ action('AdminDirectoryController@getDelete', array($parent->id, $i->id)) }}'>Удалить</a></li>
                            @else
                                <li><a href='#'>Удаление невозможна</a></li>
                            @endif
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
