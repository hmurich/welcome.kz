@foreach ($other_objects as $id=>$role_id)
    <li>
        <a class="zaved-item {{ ($role_id == $object->role_id ? 'zaved-item--active' : 'zaved-item') }}"
            href="{{ action('CabinetController@getIndex', $id) }}">
            {{ $ar_role[$role_id] }}
        </a>
    </li>
@endforeach
