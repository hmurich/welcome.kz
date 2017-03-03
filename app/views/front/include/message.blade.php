@if (!$errors->isEmpty())
    <div class="alert alert-danger alert-dismissible js_alert_mess_block">
		<span class='alert-exit'>x</span>
        @foreach ($errors->all(':message') as $mess)
			<p> {{ $mess}} </p>
		@endforeach
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible js_alert_mess_block">
		<span class='alert-exit'>x</span>
        {{ Session::get('error') }}
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible js_alert_mess_block">
		<span class='alert-exit'>x</span>
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info alert-dismissible js_alert_mess_block">
		<span class='alert-exit'>x</span>
        {{ Session::get('info') }}
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissible js_alert_mess_block">
		<span class='alert-exit'>x</span>
        {{ Session::get('warning') }}
    </div>
@endif
