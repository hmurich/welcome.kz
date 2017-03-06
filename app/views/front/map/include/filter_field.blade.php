@if ($f->is_fixed)
    <select class="header-options__select js_map_field" data-type='filter' data-id='{{ $f->spec_key }}'>
    	<option selected="true" value='0' >{{ $translator->getTransNameByKey(SysFilter::getTransKey($f->id))  }}</option>
        @foreach ($f->relNames as $n)
            <option value="{{ $n->name }}">{{ $translator->getTransNameByKey(SysFilterName::getTransKey($n->id))  }}</option>
        @endforeach
    </select>
@else
    <input type='text' class='header-options__select js_map_field' data-type='filter' data-id='{{ $f->spec_key }}' placeholder="{{ $translator->getTransNameByKey(SysFilter::getTransKey($f->id))  }}">
@endif
