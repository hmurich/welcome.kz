<ul class="list-group panel">
    <li>
        <a href="#modarate_company" class="list-group-item " data-toggle="collapse">Организация <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="modarate_company">
            <a href="{{ action('ModeratorObjectController@getIndex', 1) }}" class="list-group-item"> На проверке </a>
            <a href="{{ action('ModeratorObjectController@getIndex', 2) }}" class="list-group-item"> Не опубликованные</a>
            <a href="{{ action('ModeratorObjectController@getIndex', 3) }}" class="list-group-item"> Опубликованные </a>
        </div>
    </li>

    <li>
        <a href="#modarate_event" class="list-group-item " data-toggle="collapse">События <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="modarate_event">
            <a href="{{ action('ModeratorEventController@getIndex', 0) }}" class="list-group-item"> На проверке </a>
            <a href="{{ action('ModeratorEventController@getIndex', 1) }}" class="list-group-item"> Опубликованные</a>
        </div>
    </li>

    <li>
        <a href="#ticket_item" class="list-group-item " data-toggle="collapse">Тикеты <span class="glyphicon glyphicon-chevron-right"></span></a>
        <div class="collapse" id="ticket_item">
            @foreach (Ticket::getStatusAr() as $k=>$v)
                <a href="{{ action('ModeratorTicketController@getIndex', $k) }}" class="list-group-item">{{ $v }}</a>
            @endforeach
        </div>
    </li>


</ul>
