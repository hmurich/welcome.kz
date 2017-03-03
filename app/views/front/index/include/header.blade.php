<div class="header__inner">
    <span class="header-option">
        Welcome to Kazakhstan
    </span>
    <div class="header-options">
        <select class="header-options__select header-options__select--single js_change_city">
            <option selected="true" disabled>{{ $translator->getTransNameByKey('select_city', 'Выберите город'); }}</option>
            @foreach ($cities as $id => $name))
                <option value='{{ $id }}' {{ ($city_id == $id ? 'selected' : null) }}>
                    {{ $translator->getTransNameByKey(SysDirectoryName::getTransKey($id), $name); }}
                </option>
            @endforeach
        </select>
    </div>
    <ul class="menu">
        @if (isset($ar_cat[SysCompanyCat::meal_id]))
            <li class="menu__li menu__li--eda">
                <a href="{{ action('MapController@getIndex', SysCompanyCat::meal_id) }}">
                    {{ $translator->getTransNameByKey(SysCompanyCat::getTransKey(SysCompanyCat::meal_id)); }}
                </a>
            </li>
        @endif
        @if (isset($ar_cat[SysCompanyCat::reast_id]))
            <li class="menu__li menu__li--rest">
                <a href="{{ action('MapController@getIndex', SysCompanyCat::reast_id) }}">
                    {{ $translator->getTransNameByKey(SysCompanyCat::getTransKey(SysCompanyCat::reast_id)); }}
                </a>
            </li>
        @endif
        @if (isset($ar_cat[SysCompanyCat::party_id]))
            <li class="menu__li menu__li--pleasure">
                <a href="{{ action('MapController@getIndex', SysCompanyCat::party_id) }}">
                    {{ $translator->getTransNameByKey(SysCompanyCat::getTransKey(SysCompanyCat::party_id)); }}
                </a>
            </li>
        @endif
        @if (isset($ar_cat[SysCompanyCat::beaty_id]))
            <li class="menu__li menu__li--beauty">
                <a href="{{ action('MapController@getIndex', SysCompanyCat::beaty_id) }}">
                    {{ $translator->getTransNameByKey(SysCompanyCat::getTransKey(SysCompanyCat::beaty_id)); }}
                </a>
            </li>
        @endif
        @if (isset($ar_cat[SysCompanyCat::building_id]))
            <li class="menu__li menu__li--infrastructure">
                <a href="{{ action('MapController@getIndex', SysCompanyCat::building_id) }}">{{ $ar_cat[SysCompanyCat::building_id] }}</a>
            </li>
        @endif
    </ul>
</div>
<div class="uzor uzor--one"></div>
<div class="uzor uzor--two"></div>
<div class="uzor uzor--three"></div>
<div class="uzor uzor--four"></div>
