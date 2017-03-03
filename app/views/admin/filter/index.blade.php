@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Системный код</th>
            <th>Сорт.</th>
            <th>Наименование</th>
            <th>Тип</th>
            <th>Множественный</th>
            <th>Значения</th>
            <th>Категории</th>
            <th>Роли</th>
            <th style="width: 40px">
                <a href='{{ action('AdminFilterController@getItem') }}'>Создать</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->spec_key }}</td>
                <td>{{ $i->sort_index }}</td>
                <td>{{ $i->name }}</td>
                <td>{{ $ar_type[$i->type_id] }}</td>
                <td>{{ $i->is_many_name }}</td>
                <td>
                    @if (!$i->is_fixed)
                        {{ $i->is_fixed_name }}
                    @else
                        <?php $ar = array(); ?>
                        @foreach ($i->relNames as $r)
                            <?php $ar[] = $r->name; ?>
                        @endforeach
                        @if (count($ar) == 0)
                            не введено
                        @else
                            {{ implode($ar, ', ') }}
                        @endif
                    @endif
                </td>
                <td>
                    <?php $ar = array(); ?>
                    @foreach ($i->relCats as $r)
                        <?php $ar[] = $r->name; ?>
                    @endforeach
                    {{ implode($ar, ', ') }}
                </td>
                <td>
                    <?php $ar = array(); ?>
                    @foreach ($i->relRole as $r)
                        <?php $ar[] = $r->name; ?>
                    @endforeach
                    {{ implode($ar, ', ') }}
                </td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @if ($i->is_fixed)
                                <li><a href='{{ action('AdminFilterController@getNames', array($i->id)) }}'>Значения/варианты</a></li>
                            @endif
                            <li><a href='{{ action('AdminFilterController@getCats', array($i->id)) }}'>Категории</a></li>
                            <li><a href='{{ action('AdminFilterController@getRoles', array($i->id)) }}'>Роли</a></li>
							<li><a href='{{ action('AdminFilterController@getItem', array($i->id)) }}'>Изменить</a></li>
							<li><a href='{{ action('AdminFilterController@getDelete', array($i->id)) }}'>Удалить</a></a></li>
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
