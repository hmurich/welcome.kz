@extends('admin.layout')
@section('content')
{{ Form::open(array('url'=>action('AdminRoleController@postFilter'), 'method' => 'post', 'role'=>'form')) }}
<table class="table">
    <thead>
        <tr>
            <th style="width: 10px"> <a href='{{ AdminBaseController::generateDetailSortUral("id") }}'> id </a> </th>
            <th>Наименование</th>
            <th>Индекс сортировки</th>
            <th>Показать в фильтре</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($filters as $i)
            <tr>
                <td>{{ $i->id }}</td>
                <td>{{ $ar_filters[$i->filter_id] }}</td>
                <td><input type='text' name='data[{{ $i->id }}][sort_index]' value="{{ $i->sort_index }}"></td>
                <td>{{ Form::select('data['.$i->id.'][show_filter]', $ar_show, $i->show_filter , array('class'=>'form-control normalValidate')) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<button type="submit" class="btn btn-primary">Submit</button>
{{ Form::close() }}
@stop
