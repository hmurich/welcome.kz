@if (isset($sliders) && $sliders->count())
    <div class="zaved-big">
        <div class="zaved-big__inner">
            <img class="zaved-big__img" src="{{ $slider_1->image }}">
        </div>
    </div>
    <ul class="right-photo">
        @foreach($sliders as $s)
            <li class="right-photo__li">
                <img src="{{ $s->image }}">
            </li>
        @endforeach
    </ul>
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
