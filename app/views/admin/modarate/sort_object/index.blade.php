@extends('admin.layout')

@section('content')
{{ Form::open(array('url'=>action("AdminSortObjectController@getIndex", $cat_id), 'method' => 'get', 'role'=>'form')) }}
    <div class="form-group">
        <label class="col-md-2 control-label">Роль</label>
        <div class="col-md-10">
            {{ Form::select('role_id', array(null=>' ') + $ar_role,  Input::get('role_id') , array('class'=>'form-control')) }}
         </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Город</label>
        <div class="col-md-10">
            {{ Form::select('city_id', array(null=>' ') + $ar_city,  Input::get('city_id') , array('class'=>'form-control')) }}
         </div>
    </div>
    <button type="submit" class="btn btn-primary">Показать</button>
{{ Form::close() }}
<br /><br /><br />

{{ Form::open(array('url'=>action("AdminSortObjectController@postIndex"), 'method' => 'post', 'role'=>'form')) }}
<table class="table">
    <thead>
        <tr>
            <th style="width: 40px">Индекс сортировки</th>
            <th style="width: 10px">  id  </th>
            <th>Город</th>
            <th>Роль</th>
            <th>Наименование</th>
            <th>Кол-во просмотров</th>
            <th>Надбавка</th>
            <th>Email</th>
            <th>Создан</th>
            <th>Платное</th>
            <th>Специальное</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>
                    {{ Form::text('data_sort['.$i->id.']', $i->sort_index, array('style'=>'max-width: 70px;')) }}
                </td>
                <td>{{ $i->id }}</td>
                <td>{{ $ar_city[$i->city_id] }}</td>
                <td>{{ $ar_role[$i->role_id] }}</td>
                <td>{{ $i->name }}</td>

                <td>{{ $i->view_total }}</td>
                <td>{{ $i->view_add }}</td>

                <td>{{ $i->relUser->email }}</td>
                <td>{{ $i->created_at }}</td>
                <td>{{ $i->vip_name }}</td>
                <td>{{ $i->specail_name }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href='{{ action('AdminSortObjectController@getVip', array($i->id)) }}'>
                                @if ($i->is_vip)
                                    Убрать ВИП
                                @else
                                    Сделать ВИП
                                @endif
                            </a></li>
                            <li><a href='{{ action('AdminSortObjectController@getSpecial', array($i->id)) }}'>
                                @if ($i->is_special)
                                    Убрать специальное
                                @else
                                    Сделать специальное
                                @endif
                            </a></a></li>
						</ul>
					</div>
                </td>
            </tr>
        @endforeach
    </tbody>
	<tfoot>
		<tr>
            <td colspan=1><button type="submit" class="btn btn-primary">Сохранить</button></td>
			<td colspan=10>{{ $items->appends(Input::all())->links() }}</td>
		</tr>
	<tfoot>
</table>
@stop
