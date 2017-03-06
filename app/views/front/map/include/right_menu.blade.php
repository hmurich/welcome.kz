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

			<div class="show-filtr {{ (Input::has('role_id') ? 'show-filtr--active' : 'sdfsdf') }}">
				<span data-close='Закрыть фильтр' data-open='Открыть фильтр'>{{ (Input::has('role_id') ? 'Закрыть фильтр' : 'Открыть фильтр') }}</span>
			</div>
		</div>
		<ul class="zaved-ul js_object_list">

		</ul>
		<div class="header-bot">
			<div class="header-bot__inner">
				<div class="bot-search">
					<input class="bot-search__input" type="text" placeholder="Я ищу...">
					<input class="bot-search__submit"  type="submit">
				</div>
			</div>
		</div>
	</div>
	<div class="uzor uzor--one"></div>
	<div class="uzor uzor--two"></div>
	<div class="uzor uzor--three"></div>
	<div class="uzor uzor--four"></div>
</header>
