<header class="header" id="container">
	<div class="header__inner">
		<span class="header-option">
			Уточните параметры для лучшего поиска
		</span>
		<div class="header-options {{ (Input::has('role_id') ? 'header-options--active' : null) }}">
            {{ Form::open(array('url'=>action('EventController@getIndex'), 'method' => 'get')) }}
                <select class="header-options__select  js_change_city">
                    <option selected="true" >{{ $translator->getTransNameByKey('select_city', 'Выберите город'); }}</option>
                    @foreach ($cities as $id => $name))
                        <option value='{{ $id }}' {{ ($city_id == $id ? 'selected' : null) }}>
                            {{ $translator->getTransNameByKey(SysDirectoryName::getTransKey($id), $name); }}
                        </option>
                    @endforeach
                </select>

                <select class="header-options__select" name='role_id'>
    				<option selected="true" value="0">Выберите роль</option>
                    @foreach ($ar_role as $id => $name))
                        <option value='{{ $id }}' {{ (Input::get("role_id") == $id ? 'selected' : null) }}>
                            {{ $name }}
                        </option>
                    @endforeach
    			</select>

                <input type='text' class='header-options__select' name='name'  placeholder="Укажите название" value='{{ Input::get("name") }}' />
                <input type='text' class='header-options__select' name='company_name'  placeholder="Укажите название завдение" value='{{ Input::get("company_name") }}' />

                @if (Input::has('date'))
                    @foreach (Input::get('date') as $k=>$v)
                        <input type='hidden' name='date[{{ $k }}]' value='{{ $v }}'/>
                    @endforeach
                @endif

                <input type='submit' />

            {{ Form::close() }}
			<div class="show-filtr {{ (Input::has('role_id') ? 'show-filtr--active' : 'sdfsdf') }}">
				<span data-close='Закрыть фильтр' data-open='Открыть фильтр'>{{ (Input::has('role_id') ? 'Закрыть фильтр' : 'Открыть фильтр') }}</span>
			</div>
		</div>
        {{ Form::open(array('url'=>action('EventController@getIndex'), 'method' => 'get', 'class'=>'js_datepicker_form')) }}
    		<div id="datepicker" class="calendar"></div>
            <input type='hidden' class='js_datepicker_year' name='date[year]' value='{{ Input::get("date.year") }}'  />
            <input type='hidden' class='js_datepicker_month' name='date[month]' value='{{ Input::get("date.month") }}' />
            <input type='hidden' class='js_datepicker_day' name='date[day]' value='{{ Input::get("date.day") }}' />
        {{ Form::close() }}

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
