<ul class="news-right">
    @foreach ($news as $n)
        <li>
            <div class="news-mini">
                @if ($n->image)
                    <a class="news-mini__img" href="{{ action("CabinetController@getNews", array($n->object_id, $n->id)) }}">
                        <img src="{{ $n->image }}" style='width: 100%;'>
                    </a>
                @endif
                <div class="news-text">
                    <a class="news-text__heading" href="#">{{ $n->title }}</a>
                    <p class="news-text__text">{{ $n->short_note }}</p>
                    <a class="news-text__more" href='{{ action("CabinetController@getNews", array($n->object_id, $n->id)) }}'>Узнать подробнее...</a>
                </div>
            </div>
        </li>
    @endforeach
</ul>
