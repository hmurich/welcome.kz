@if ($s->relFilter->is_fixed)
    <select class="edit-row__input" name='data[{{ $s->relFilter->spec_key }}][]' required {{ ($s->relFilter->is_many ? 'multiple' : null) }} >
        @foreach ($s->relFilter->relNames as $n)
            @if (isset($ar_values[$s->relFilter->spec_key][$n->id]))
                <option value="{{ $n->id }}" selected="selected">{{ $translator->getTransNameByKey(SysFilterName::getTransKey($n->id))  }} </option>
            @else
                <option value="{{ $n->id }}">{{ $translator->getTransNameByKey(SysFilterName::getTransKey($n->id))  }}</option>
            @endif
        @endforeach
    </select>
@else
    @if (isset($ar_values[$s->relFilter->spec_key]))
        <input class="edit-row__input" name='data[{{ $s->relFilter->spec_key }}][]' type="text" value='{{ array_shift($ar_values[$s->relFilter->spec_key]) }}' required>
    @else
        <input class="edit-row__input" name='data[{{ $s->relFilter->spec_key }}][]' type="text"  required>
    @endif
@endif
