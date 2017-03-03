@if ($f->is_fixed)
    <select class="header-options__select js_map_field" data-type='filter' data-id='{{ $f->spec_key }}'>
    	<option selected="true" value='0' >{{ $f->name }}</option>
        @foreach ($f->relNames as $n)
            <option value="{{ $n->name }}">{{ $n->name }}</option>
        @endforeach
    </select>
@else
    <input type='text' class='header-options__select js_map_field' data-type='filter' data-id='{{ $f->spec_key }}' placeholder="{{ $f->name }}">
@endif
