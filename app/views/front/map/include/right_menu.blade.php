<header class="header js_map_field_main" data-cat_id='{{ $cat->id }}' data-city_center='{{ $city_coords }}'>
	<div class="header__inner">
		<span class="header-option">{{ $cat->name }}</span>
		<div class="header-options">

			<select class="header-options__select js_map_field" data-type='main' data-id='role_id'>
				<option selected="true" >Выберите тип</option>
                @foreach ($ar_role as $id => $name))
                    <option value='{{ $id }}'>
                        {{ $translator->getTransNameByKey(SysCompanyRole::getTransKey($id), $name); }}
                    </option>
                @endforeach
			</select>

            @if ($filter_1)
                @include('front.map.include.filter_field', array('f'=>$filter_1))
            @endif

            @foreach ($filters as $fltr)
                @include('front.map.include.filter_field', array('f'=>$fltr))
            @endforeach

			<span class="show-filtr">Открыть фильтр</span>
		</div>
		<ul class="zaved-ul js_object_list">

		</ul>
		<div class="header-bot">
			<div class="header-bot__inner">
				<input class="bot-search" type="text" placeholder="Я ищу...">
			</div>
		</div>
	</div>
	<div class="uzor uzor--one"></div>
	<div class="uzor uzor--two"></div>
	<div class="uzor uzor--three"></div>
	<div class="uzor uzor--four"></div>
</header>
