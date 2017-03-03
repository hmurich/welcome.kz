<ul class="list-group panel">
    <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>Меню</b></li>
    <li class="list-group-item"><a href="{{ action('AdminController@getIndex') }}" >Главная</a></li>
    <li>
        <a href="#modarate_company" class="list-group-item " data-toggle="collapse">Организация <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="modarate_company">
            <a href="{{ action('AdminObjectController@getIndex', 1) }}" class="list-group-item"> На проверке </a>
            <a href="{{ action('AdminObjectController@getIndex', 2) }}" class="list-group-item"> Не опубликованные</a>
            <a href="{{ action('AdminObjectController@getIndex', 3) }}" class="list-group-item"> Опубликованные </a>
        </div>
    </li>

    <li>
        <a href="#modarate_event" class="list-group-item " data-toggle="collapse">События <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="modarate_event">
            <a href="{{ action('AdminEventController@getIndex', 0) }}" class="list-group-item"> На проверке </a>
            <a href="{{ action('AdminEventController@getIndex', 1) }}" class="list-group-item"> Опубликованные</a>
        </div>
    </li>



    <li>
        <a href="#modarate_sort_company" class="list-group-item " data-toggle="collapse">Сортировка организаций <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="modarate_sort_company">
            @foreach (SysCompanyCat::lists('name', 'id') as $k=>$v)
                <a href="{{ action('AdminSortObjectController@getIndex', $k) }}" class="list-group-item"> {{ $v }} </a>
            @endforeach
        </div>
    </li>
    <li class="list-group-item"><a href="{{ action('AdminTaxiController@getIndex') }}" >Такси</a></li>

    <li class="list-group-item"><a href="{{ action('AdminFilterController@getIndex') }}" >Фильтры</a></li>
    <li class="list-group-item"><a href="{{ action('AdminTagController@getIndex') }}" >Хэш тэги</a></li>
    <li>
        <a href="#ticket_item" class="list-group-item " data-toggle="collapse">Тикеты <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="ticket_item">
            @foreach (Ticket::getStatusAr() as $k=>$v)
                <a href="{{ action('AdminTicketController@getIndex', $k) }}" class="list-group-item">{{ $v }}</a>
            @endforeach
        </div>
    </li>

    <li>
        <a href="#demo1" class="list-group-item " data-toggle="collapse">Переводчик <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="demo1">
            <a href="{{ action('AdminTransKeyContrroller@getIndex') }}" class="list-group-item">Ключи для перевода</a>
            @foreach (SysDirectory::getLangAr() as $k=>$v)
                @if ($k == 1)
                    <?php continue; ?>
                @endif
                <a href="{{ action('AdminTranslateController@getIndex', $k) }}" class="list-group-item">{{ $v }}</a>
            @endforeach
        </div>
    </li>

    <li>
        <a href="#demo3" class="list-group-item " data-toggle="collapse">Справочники <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="demo3">
            <a href="{{ action('AdminModeratorController@getIndex') }}" class="list-group-item">Модераторы</a>
            <a href="{{ action('AdminComnanyCatController@getIndex') }}" class="list-group-item">Категории компаний</a>
            <a href="{{ action('AdminRoleController@getIndex') }}" class="list-group-item">Роли компаний</a>
            @foreach(SysDirectory::lists('name', 'id') as $k=>$name)
                <a href="{{ action('AdminDirectoryController@getIndex', $k) }}" class="list-group-item">{{ $name }}</a>
            @endforeach
            <a href="{{ action('AdminDirectoryListController@getIndex') }}" class="list-group-item">Список стандартных справочников</a>
        </div>
    </li>
</ul>
