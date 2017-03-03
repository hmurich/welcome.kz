<header class="header js_map_field_main" data-cat_id='{{ $cat->id }}' data-city_center='{{ $city_coords }}'>
	<div class="header__inner">
		<span class="header-option">{{ $cat->name }}</span>
		<div class="header-options">
            <input type='text' name='name' class='header-options__select' value="{{ search }}" />

            <select class="header-options__select  js_change_city">
                <option selected="true" >{{ $translator->getTransNameByKey('select_city', 'Выберите город'); }}</option>
                @foreach ($cities as $id => $name))
                    <option value='{{ $id }}' {{ ($city_id == $id ? 'selected' : null) }}>
                        {{ $translator->getTransNameByKey(SysDirectoryName::getTransKey($id), $name); }}
                    </option>
                @endforeach
            </select>

			<select class="header-options__select" >
				<option selected="true"  name='role_id'>Выберите тип</option>
                @foreach ($ar_role as $id => $name))
                    <option value='{{ $id }}' {{ (Input::get('role_id') == $id ? 'selected' : null) }}>
                        {{ $translator->getTransNameByKey(SysCompanyRole::getTransKey($id), $name); }}
                    </option>
                @endforeach
			</select>

			<span class="show-filtr">Открыть фильтр</span>
		</div>
		<ul class="zaved-ul ">
            @foreach ($items as $i)

            @endforeach
		</ul>
	</div>
	<div class="uzor uzor--one"></div>
	<div class="uzor uzor--two"></div>
	<div class="uzor uzor--three"></div>
	<div class="uzor uzor--four"></div>
</header>
