<span class="zaved-info__heading">Отзывы</span>
@if (Auth::check())
    {{ Form::open(array('url'=>action('ObjectController@postComment', $object->id), 'method' => 'post', 'role'=>'form')) }}
        <input type='text' name='title' placeholder="Ваше имя" required=""/> <br />
        <ul class="stars stars--click js_stars">
            <li data-score='1'></li>
            <li class='empty' data-score='2'></li>
            <li class='empty' data-score='3'></li>
            <li class='empty' data-score='4'></li>
            <li class='empty' data-score='5'></li>
        </ul>
        <input type="hidden" name='score' class="js_stars_val" value="1">
        <br /><br />
        <textarea name='note' placeholder="Ваш отзыв" required=""></textarea> <br />
        <input type='submit' />
    {{ Form::close() }}
@else
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <?php
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace("/", "%2F", $uri);
    ?>
    <script src="//ulogin.ru/js/ulogin.js"></script>
    Авторизуйтесь для выставления рейтинга
    <div id="uLogin"
        data-ulogin="display=small;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'].$uri }};mobilebuttons=0;">
    </div>
@endif

<ul class="otzyv-ul">
    @foreach ($comments as $c)
        <li>
            <div class="otzyv">
                <div class="otzyv-up">
                    <span class="otzyv-up__name">{{ $c->title }}</span>
                    <span class="otzyv-up__date">{{ $c->created_at }}</span>
                    <div class="rating otzyv-up__rating">
                        <span class="rating__text">Рейтинг:</span>
                        <ul class="stars">
                            {{ ModelSnipet::generateStar($c->score) }}
                        </ul>
                        <div class="ocenka">
                            <span>{{ $c->score }}.0</span>
                            <span class="rasdel">/</span>
                            <span>5.0</span>
                        </div>
                    </div>
                </div>
                <span class="otzyv__text">
                    {{ $c->note }}
                </span>
            </div>
        </li>
    @endforeach
</ul>
