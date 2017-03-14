@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
			<div class="zaved-up">
                <div class="mob-start mob-start--add">
                    <span></span>
                    <span></span>
                    <span></span>     
                </div>
                <span class="h-heading">{{ $title }}</span>
            </div>    
            <ul class="otzyv-ul">
                @foreach ($comments as $c)
                    <li>
                        <div class="otzyv">
                            <div class="otzyv-up">
                                <span class="otzyv-up__name">{{ $c->title }}</span>
                                <span class="otzyv-up__date">{{ $c->created_at }}</span>
                            </div>
                            <span class="otzyv__text">
                                {{ $c->note }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
	</div>
</div>
@stop
