<ul class="otzyv-ul">
    @foreach ($comments as $c)
        <li>
            <div class="otzyv">
                <div class="otzyv-up">
                    <span class="otzyv-up__name">{{ $c->title }}</span>
                    <span class="otzyv-up__date">{{ $c->created_at }}</span>
                    <div class="rating otzyv-up__rating">
                        <span class="rating__text">{{ $translator->getTransNameByKey('Рейтинг') }}:</span>
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
