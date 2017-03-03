<header class="header">
    <div class="header__inner">
        <span class="header-option">
            Личный кабинет
        </span>
        <br/>
            @if (!$object->is_active)
                Кабинет на модерации
            @elseif ($object->is_open)
                <a href='{{ action("CabinetController@getOpenDoor", $object->id) }}'>Закрыть кабинет</a>
            @else
                <a href='{{ action("CabinetController@getOpenDoor", $object->id) }}'>Открыть кабинет</a>
            @endif
        <!--
            <div class="user-info">
                <img class="user-info__img" src="https://api.fnkr.net/testimg/70x90/00CED1/FFF/?text=img+placeholder" >
                <div class="user-text">
                    <span class="user-text__heading">Название заведени</span>
                    <span class="user-text__text">
                        Номера:
                    </span>
                    <span class="user-text__text">
                        Спецуслуги:
                    </span>
                    <span class="user-text__regym">
                        Режим работы:
                    </span>
                </div>
            </div>
        -->
        <ul class="cab-menu">
            <li class="cab-menu__li cab-menu__li--approve">
                <a href="{{ action('CabinetController@getIndex', $object->id) }}"><span>Личный кабинет</span></a>
            </li>
            <li class="cab-menu__li cab-menu__li--edit">
                <a href="{{ action('CabinetFieldController@getIndex', $object->id) }}"><span>Редактировать информацию</span></a>
            </li>

            <li class="cab-menu__li cab-menu__li--approve">
                <a href="{{ action('CabinetTagController@getIndex', $object->id) }}"><span>Тэги</span></a>
            </li>

            <li class="cab-menu__li cab-menu__li--news">
                <a href="{{ action('CabinetNewsController@getIndex', $object->id) }}"><span>Новости</span></a>
            </li>

            <li class="cab-menu__li cab-menu__li--news">
                <a href="{{ action('CabinetEventController@getIndex', $object->id) }}"><span>События</span></a>
            </li>
            <li class="cab-menu__li cab-menu__li--news">
                <a href="{{ action('CabinetCommentController@getIndex', $object->id) }}"><span>Отзывы</span></a>
            </li>
            @if ($role->is_reserve)
                <li class="cab-menu__li cab-menu__li--news">
                    <a href="{{ action('CabinetReserveController@getIndex', $object->id) }}"><span>Бронирование</span></a>
                </li>
            @endif
            <li class="cab-menu__li cab-menu__li--news">
                <a href="{{ action('CabinetMapController@getIndex', $object->id) }}"><span>Карта</span></a>
            </li>
            <li class="cab-menu__li cab-menu__li--add">
                <a href="{{ action('TicketController@postNewRole') }}"><span>Добавить заведение</span></a>
            </li>
        </ul>
        <div class="header-bot header-bot--cab">
            <div class="header-bot__inner">
                <a href="{{ action('TicketController@getIndex') }}" class="but but-support">
                    Обратная связь с тех.поддержкой
                </a>
            </div>
        </div>
    </div>
    <div class="uzor uzor--one"></div>
    <div class="uzor uzor--two"></div>
    <div class="uzor uzor--three"></div>
    <div class="uzor uzor--four"></div>
</header>
