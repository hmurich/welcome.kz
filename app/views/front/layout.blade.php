<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta id="viewport" name="viewport" content="width=device-width,initial-scale=1">
		<link href="" rel="stylesheet" type="text/css">
		<title>{{ (isset($title) ? $title : null) }}</title>
	    {{ HTML::style('front/css/style.css'); }}
		{{ HTML::style('front/css/text.css'); }}
		{{ HTML::style('front/add/alert/main.css'); }}
		{{ HTML::style('front/add/css/main.css'); }}
	    @yield('css')
	</head>
	<body>
		@include('front.include.message')

		@yield('content')

		{{ HTML::script('front/js/jquery-3.0.0.min.js'); }}
		{{ HTML::script('front/js/jquery-ui.js'); }}
		{{ HTML::script('front/js/perfect-scrollbar.jquery.min.js'); }}
		{{ HTML::script('front/js/perfect-scrollbar.min.js'); }}
		{{ HTML::script('front/js/slick.min.js'); }}
		{{ HTML::script('front/js/wow.min.js'); }}
		{{ HTML::script('front/js/script.js'); }}
		{{ HTML::script('front/add/main.js'); }}
    	@yield('js')

		@if (isset($translator))
			{{ $translator->putArLangToCache() }}
		@endif
	</body>
</html>
