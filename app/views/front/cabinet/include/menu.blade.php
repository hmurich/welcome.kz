
<header class="header" id="container">
    <div class="header__inner">
        <span class="header-option">
            {{ $translator->getTransNameByKey('personal_cabinet') }}
        </span>
        <br/>
        @if (!$object->is_active)
            <span class="under-moderation">{{ $translator->getTransNameByKey('cabinet_on_moderate') }}</span>
        @elseif ($object->is_open)
            <a class="open-cab" href='{{ action("CabinetController@getOpenDoor", $object->id) }}'>
                <span class="open-cab__text">{{ $translator->getTransNameByKey('close_cabinet') }}</span>
                <div class="open-cab__area open-cab__area--area2"></div>
            </a>
        @else
            <a class="open-cab" href='{{ action("CabinetController@getOpenDoor", $object->id) }}'>
                <span class="open-cab__text">{{ $translator->getTransNameByKey('open_cabinet') }}</span>
                <div class="open-cab__area"></div>
            </a>
        @endif
        <ul class="cab-menu">
            <li class="cab-menu__li cab-menu__li--approve">
                <a href="{{ action('CabinetController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('personal_cabinet') }}</span></a>
            </li>
            <li class="cab-menu__li cab-menu__li--edit">
                <a href="{{ action('CabinetFieldController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('edit_inform') }}</span></a>
            </li>

            <li class="cab-menu__li cab-menu__icons cab-menu__li--tag">
                <a href="{{ action('CabinetTagController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('tag') }}</span></a>
            </li>

            <li class="cab-menu__li cab-menu__li--news">
                <a href="{{ action('CabinetNewsController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('news') }}</span></a>
            </li>

            <li class="cab-menu__li cab-menu__icons cab-menu__li--events">
                <a href="{{ action('CabinetEventController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('events') }}</span></a>
            </li>
            <li class="cab-menu__li cab-menu__icons cab-menu__li--feedback">
                <a href="{{ action('CabinetCommentController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('reviews') }}</span></a>
            </li>
            @if ($role->is_reserve)
                <li class="cab-menu__li cab-menu__icons cab-menu__li--map">
                    <a href="{{ action('CabinetReserveController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('bron') }}</span></a>
                </li>
            @endif
            <li class="cab-menu__li cab-menu__icons cab-menu__li--map">
                <a href="{{ action('CabinetMapController@getIndex', $object->id) }}"><span>{{ $translator->getTransNameByKey('map') }}</span></a>
            </li>
            <li class="cab-menu__li cab-menu__li--add">
                <a href="{{ action('TicketController@postNewRole') }}"><span>{{ $translator->getTransNameByKey('add_zaved_href') }}</span></a>
            </li>
            <li class="cab-menu__li cab-menu__li--exit">
            	<a href="/moderator/logout"><span>Выйти</span></a>
            </li>
        </ul>
        <div class="header-bot header-bot--cab">
            <div class="header-bot__inner">
                <a href="{{ action('TicketController@getIndex') }}" class="but but-support">
                    {{ $translator->getTransNameByKey('ticket_href') }}
                </a>
            </div>
        </div>
    </div>
    <div class="uzor uzor--one"></div>
    <div class="uzor uzor--two"></div>
    <div class="uzor uzor--three"></div>
    <div class="uzor uzor--four"></div>
</header>
