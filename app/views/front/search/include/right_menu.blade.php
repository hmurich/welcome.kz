<header class="header js_map_field_main" id="container"  data-city_center='{{ $city_coords }}'>
	<div class="header__inner">
		<span class="header-option">{{ $title }}</span>
		<div class="header-options">
            {{ Form::open(array('url'=>action('SearchController@getIndex'), 'method' => 'get')) }}
                <input type='text' name='name' class='header-options__select' value="{{ $search }}" />
                <select class="header-options__select  js_change_city">
                    <option selected="true" >{{ $translator->getTransNameByKey('select_city', 'Выберите город'); }}</option>
                    @foreach ($cities as $id => $name))
                        <option value='{{ $id }}' {{ ($city_id == $id ? 'selected' : null) }}>
                            {{ $translator->getTransNameByKey(SysDirectoryName::getTransKey($id), $name); }}
                        </option>
                    @endforeach
                </select>
    			<select class="header-options__select" >
    				<option selected="true"  name='role_id'>{{ $translator->getTransNameByKey('select_role'); }}</option>
                    @foreach ($ar_role as $id => $name))
                        <option value='{{ $id }}' {{ (Input::get('role_id') == $id ? 'selected' : null) }}>
                            {{ $translator->getTransNameByKey(SysCompanyRole::getTransKey($id), $name); }}
                        </option>
                    @endforeach
    			</select>
                <input class="but but--search"  type='submit' />

            {{ Form::close() }}

            <div class="show-filtr {{ (Input::has('role_id') ? 'show-filtr--active' : 'sdfsdf') }}">
                <span data-close='{{ $translator->getTransNameByKey('close_filter') }}' data-open='{{ $translator->getTransNameByKey('open_filter') }}'>{{ (Input::has('role_id') ? $translator->getTransNameByKey('close_filter') : $translator->getTransNameByKey('open_filter')) }}</span>
            </div>
		</div>
		<ul class="zaved-ul">
            @foreach ($items as $i)
                <li class="js_object_li" data-lng='{{ $i["lng"] }}' data-lat='{{ $i["lat"] }}' data-name='{{ $i["name"] }}' data-id='{{ $i["id"] }}'>
                    <a class="mini-zaved" href="{{ action('ObjectController@getIndex', $i['id']) }}">
                        <img class="mini-zaved__img" src="{{ $i['logo'] }}" style="max-width: 70px;">
                        <div class="info-zaved">
                            <span class="info-zaved__heading">
                                {{ $i['name'] }}
                            </span>
                            <ul class="info-ul">
                                @foreach ($i['options'] as $k => $v)
                                    <li>
                                        <span>{{ $k }}:</span> {{ $v }}
                                    </li>
                                @endforeach
                            </ul>
                            <p class="info-zaved__regym">
                                <span>Режим работы:</span> {{ $i['time_begin'] }} - {{ $i['time_end'] }}
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
