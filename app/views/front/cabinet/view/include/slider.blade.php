@if (isset($sliders) && $sliders->count())
    <div class="zaved-big">
        <div class="zaved-big__inner">
            <div class="slider">
            @foreach($sliders as $s)
                <div class="slider-item">
                    <img class="zaved-big__img" src="{{ $s->image }}">
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <div class="right-photo">
        @foreach($sliders as $s)
            <div class="right-photo__li">
                <img src="{{ $s->image }}">
            </div>
        @endforeach
    </div>
@else
    <div class="zaved-big">
        <div class="zaved-big__inner">
            <div class="slider">
                <div class="slider-item">
                    <img class="zaved-big__img" src="/front/img/zaved-edit.jpg">
                </div>
                <div class="slider-item">
                    <img class="zaved-big__img" src="/front/img/zaved-edit.jpg">
                </div>
                <div class="slider-item">
                    <img class="zaved-big__img" src="/front/img/zaved-edit.jpg">
                </div>                                
            </div>
        </div>
    </div>
    <div class="right-photo">
        <div class="right-photo__li">
            <img src="/front/img/mini-edit.jpg">
        </div>
        <div class="right-photo__li">
            <img src="/front/img/mini-edit.jpg">
        </div>
        <div class="right-photo__li">
            <img src="/front/img/mini-edit.jpg">
        </div>
    </div>
@endif
