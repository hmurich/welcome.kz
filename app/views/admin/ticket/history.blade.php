@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px">  id  </th>
            <th>Текст ответа</th>
            <th>Статус до</th>
            <th>Статус после</th>
            <th>Email ответчика</th>
            <th>Создан</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $i->note }}</td>
                <td>{{ $ar_status[$i->before_status_id] }}</td>
                <td>{{ $ar_status[$i->after_status_id] }}</td>
                <td>{{ $i->relUser->email }}</td>
                <td>{{ $i->created_at }}</td>
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
