<header class="header " >
	<div class="header__inner">
		<span class="header-option">{{ $object->name }}</span>
		<ul class="zaved-ul js_object_list">
            @foreach ($simular_objects as $s)
                <li>
    				<a class="mini-zaved" href="{{ action('ObjectController@getIndex', $s->id) }}">
    					<img class="mini-zaved__img" src="{{ $s->relStandartData->logo }}" style="max-width: 80px; margin-right: 5px;">
    					<div class="info-zaved">
    						<span class="info-zaved__heading">
    							{{ $s->name }}
    						</span>
    						<ul class="info-ul">
                                @foreach ($s->relSpecialData()->where('show_filter', 1)->get() as $i)
                                    <li>
        								<span>{{ $translator->getTransNameByKey(SysFilter::getTransKey($i->filter_id)) }}:</span> {{ implode(", ", $i->getVal()) }}
        							</li>
                                @endforeach
    						</ul>
    						<p class="info-zaved__regym">
    							<span>Режим работы:</span> {{ $s->relStandartData->begin_time }} - {{ $s->relStandartData->end_time }}
    						</p>
    					</div>
    				</a>
    			</li>
            @endforeach
		</ul>
	</div>
	<div class="uzor uzor--one"></div>
	<div class="uzor uzor--two"></div>
	<div class="uzor uzor--three"></div>
	<div class="uzor uzor--four"></div>
</header>
