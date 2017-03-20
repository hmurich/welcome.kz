<header class="header" id="container">	
    <div class="header__inner">
		<span class="header-option">
			Уточните параметры для лучшего поиска
		</span>
        <span class="back">Назад</span>
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
    				<option selected="true" value="0">{{ $translator->getTransNameByKey('select_role'); }}</option>
                    @foreach ($ar_role as $id => $name))
                        <option value='{{ $id }}' {{ (Input::get("role_id") == $id ? 'selected' : null) }}>
                            {{ $translator->getTransNameByKey(SysCompanyRole::getTransKey($id), $name); }}
                        </option>
                    @endforeach
    			</select>

                <input type='text' class='header-options__select' name='name'  placeholder="{{ $translator->getTransNameByKey('set_event_title') }}" value='{{ Input::get("name") }}' />
                <input type='text' class='header-options__select' name='company_name'  placeholder="{{ $translator->getTransNameByKey('set_zaved_title') }}" value='{{ Input::get("company_name") }}' />

                @if (Input::has('date'))
                    @foreach (Input::get('date') as $k=>$v)
                        <input type='hidden' name='date[{{ $k }}]' value='{{ $v }}'/>
                    @endforeach
                @endif

                <input class="but header-options__but" type='submit' />

            {{ Form::close() }}
			<div class="show-filtr {{ (Input::has('role_id') ? 'show-filtr--active' : 'sdfsdf') }}">
				<span data-close='{{ $translator->getTransNameByKey('close_filter') }}' data-open='{{ $translator->getTransNameByKey('open_filter') }}'>{{ (Input::has('role_id') ? $translator->getTransNameByKey('close_filter') : $translator->getTransNameByKey('open_filter')) }}</span>
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
                <div class="bot-search">
                    <input class="bot-search__input" type="text" placeholder="{{ $translator->getTransNameByKey('i_find'); }}">
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
