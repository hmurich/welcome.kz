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
        <label class="col-md-2 control-label">Есть перевод</label>
        <div class="col-md-10">
            {{ Form::select('filter[is_have]', array(0=>'Нет', 1=>'Да'), Input::get('filter.is_have'), array('class'=>'form-control ')) }}
         </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Строка на русском</label>
        <div class="col-md-10">
            {{ Form::text('russion_text', Input::get('russion_text'), array('class'=>'form-control ')) }}
         </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">{{ $lang->name }}</label>
        <div class="col-md-10">
            {{ Form::text('filter[trans_name]', Input::get('filter.trans_name'), array('class'=>'form-control ')) }}
         </div>
    </div>
    <button type="submit" class="btn btn-primary">Отфильтровать</button>
{{ Form::close() }}

<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Ключ</th>
            <th>На русском</th>
            <th>{{ $lang->name }}</th>
            <th>Переведен</th>
            <th style="width: 40px"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->relKey->key }}</td>
                <td>{{ $i->relKey->name }}</td>
                <td>{{ $i->trans_name }}</td>
                <td>{{ $i->is_have_name }}</td>
                <td>
                    <div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Действие<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href='{{ action('AdminTranslateController@getItem', array($lang->id, $i->id)) }}'>Изменить</a></li>
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
