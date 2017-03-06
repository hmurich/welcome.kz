@extends('front.layout')
@section('content')

@include('front.cabinet.include.menu')
<div class="main-part">
	<div class="main-part__inner">
		<div class="content-part">
			<span class="h-heading">{{ $title }}</span>
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
