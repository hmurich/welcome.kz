<header class="header" id="container">
	<div class="header__inner">
		<span class="header-option">{{ $object->name }}</span>
        <span class="back js_back_link">Назад</span>
		<ul class="zaved-ul js_object_list">
            @foreach ($simular_objects as $s)
				<?php
					$first_image = $s->relStandartData->logo_catalog;

			        if (!$first_image)
			            $first_image = 'https://api.fnkr.net/testimg/70x90/00CED1/FFF/?text=img+placeholder';
				?>

                <li class='{{ ($s->id == $object->id ? "main_object" : null) }}'>
    				<a class="mini-zaved" href="{{ action('ObjectController@getIndex', $s->id) }}">
    					<img class="mini-zaved__img" src="{{ $first_image }}" style="max-width: 80px; margin-right: 5px;">
    					<div class="info-zaved">
    						<span class="info-zaved__heading">
    							{{ $s->name }}
    						</span>
    						<ul class="info-ul">
								<li>{{ $s->relStandartData->slogan }}</li>
                                @foreach ($s->relSpecialData()->where('show_filter', 1)->get() as $i)
                                    <li>
        								 {{ implode(", ", $i->getVal()) }}
        							</li>
                                @endforeach
								<li>{{ $s->relStandartData->address }}</li>
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
