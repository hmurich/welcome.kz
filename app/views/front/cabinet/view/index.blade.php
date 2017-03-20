<div class="main-part" id="content">
    <div class="main-part__inner">
        <div class="content-part">
            <div class="zaved-up">
                <div class="cab-top">
	                <span class="zaved-up__img" style='width: 180px;'>
	                    @if ($standart_data && $standart_data->logo)
	                        <img src="{{ $standart_data->logo }}" style='width: 100%;' />
	                    @else
	                        <img src="/front/img/zaved-edit.jpg"  style='width: 100%;' />
	                    @endif
	                </span>
		        	<div class="mob-start mob-start--main">
		                  <span></span>
		                  <span></span>
		                  <span></span>     
		            </div>
			     </div>
                <div class="upzaved-text">
                    <h3 class="upzaved-text__heading">
                        {{ $object->name }}
                    </h3>
                    <span class="upzaved-text__des">
                        @if ($standart_data && $standart_data->slogan)
                            {{ $standart_data->slogan }}
                        @endif
                    </span>
                    <ul class="zaved-menu">
					    					@include('front.cabinet.include.top_menu')
										</ul>
                </div>
            </div>
            <div class="zaved-photo">                
                @include('front.cabinet.view.include.slider')
            </div>
            <div class="zaved-middle">
                <div class="zaved-middle__left">
                    <div class="middle-info">
                        <div class="rating">
                            <span class="rating__text">{{ $translator->getTransNameByKey('raiting') }}:</span>
                            <ul class="stars">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <div class="ocenka">
                                <span>4.0</span>
                                <span class="rasdel">/</span>
                                <span>5.0</span>
                            </div>
                        </div>
                        <div class="views">
                            <span>{{ $translator->getTransNameByKey('wathc') }}:</span>
                            {{ $object->view_total }} {{ $translator->getTransNameByKey('people') }}
                        </div>
                        <a class="but middle-info__but" href="#">{{ $translator->getTransNameByKey('show_on_map') }}</a>
                    </div>
                </div>
                @if ($role->is_reserve)
                    <div class="zaved-middle__right">
                        <a class="but" href="#">{{ $translator->getTransNameByKey('bron_button') }}</a>
                    </div>
                @endif
            </div>
            <div class="zaved-content">
                <div class="zaved-content__left">
                    <div class="zaved-info">
                        <ul class="spisok">
                            <li><span>{{ $translator->getTransNameByKey('zaved_title') }}:</span>{{ $object->name }}</li>
                            @if ($standart_data)
                                <li><span>{{ $translator->getTransNameByKey('zaved_slogan') }}:</span>{{ $standart_data->slogan }}</li>
                                <li><span>{{ $translator->getTransNameByKey('zaved_address') }}:</span>{{ $standart_data->address }}</li>
                                <li><span>{{ $translator->getTransNameByKey('zaved_phone') }}:</span>{{ $standart_data->phone }}</li>
                            @endif

                            @if ($special_data)
                                @foreach ($special_data as $s)
                                    <li><span>{{ $translator->getTransNameByKey(SysFilter::getTransKey($s->filter_id)) }}:</span> {{ implode(", ", $s->getVal()) }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="zaved-content__right">
                    @include('front.cabinet.view.include.news')
                </div>
            </div>
        </div>
    </div>
</div>
