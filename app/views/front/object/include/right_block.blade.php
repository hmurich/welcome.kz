<header class="header " >
	<div class="header__inner">
		<span class="header-option">{{ $object->name }}</span>
		<ul class="zaved-ul js_object_list">
            @foreach ($simular_objects as $s)
				<?php
					$first_image = $s->relSliders()->first();
			        if ($first_image)
			            $first_image = $first_image->image;

			        if (!$first_image)
			            $first_image = 'https://api.fnkr.net/testimg/70x90/00CED1/FFF/?text=img+placeholder';
				?>
                <li>
    				<a class="mini-zaved" href="{{ action('ObjectController@getIndex', $s->id) }}">
    					<img class="mini-zaved__img" src="{{ $first_image }}" style="max-width: 80px; margin-right: 5px;">
    					<div class="info-zaved">
    						<span class="info-zaved__heading">
    							{{ $s->name }}
    						</span>
    						<ul class="info-ul">
								<li><span>Краткий описание</span>{{ $s->relStandartData->slogan }}</li>
                                @foreach ($s->relSpecialData()->where('show_filter', 1)->get() as $i)
                                    <li>
        								<span>{{ $translator->getTransNameByKey(SysFilter::getTransKey($i->filter_id)) }}:</span> {{ implode(", ", $i->getVal()) }}
        							</li>
                                @endforeach
								<li><span>Адресс</span>{{ $s->relStandartData->address }}</li>
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
