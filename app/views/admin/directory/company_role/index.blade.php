@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th><a href='{{ AdminBaseController::generateDetailSortUral("name") }}'>Наименование</a></th>
            <th>Категория</th>
            <th>Есть бронирование</th>
            <th style="width: 40px">
                <a href='{{ action('AdminRoleController@getItem') }}'>Создать</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->name }}</td>
                <td>
                    <?php $ar = array(); ?>
                    @foreach ($i->relCats as $r)
                        <?php $ar[] = $r->name; ?>
                    @endforeach
                    {{ implode($ar, ', ') }}
                </td>
                <td>{{ $ar_yeas[$i->is_reserve] }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href='{{ action('AdminRoleController@getCat', array($i->id)) }}'>Категории</a></li>
                            <li><a href='{{ action('AdminRoleController@getFilter', array($i->id)) }}'>Поля</a></li>
							<li><a href='{{ action('AdminRoleController@getItem', array($i->id)) }}'>Изменить</a></li>
							<li><a href='{{ action('AdminRoleController@getDelete', array($i->id)) }}'>Удалить</a></a></li>
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
