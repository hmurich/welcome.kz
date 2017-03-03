@if ($s->relFilter->is_fixed)
    <select class="edit-row__input" name='data[{{ $s->relFilter->spec_key }}][]' required {{ ($s->relFilter->is_many ? 'multiple' : null) }} >
        @foreach ($s->relFilter->relNames as $n)
            @if (isset($ar_values[$s->relFilter->spec_key][$n->id]))
                <option value="{{ $n->id }}" selected="selected">{{ $n->name }}</option>
            @else
                <option value="{{ $n->id }}">{{ $n->name }}</option>
            @endif
        @endforeach
    </select>
@else
    <input class="edit-row__input" name='data[{{ $s->relFilter->spec_key }}][]' type="text" value='{{ array_shift($ar_values[$s->relFilter->spec_key]) }}' required>
@endif
