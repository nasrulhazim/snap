@component('mail::message')
Hi!<br>

{{ $message }}

@if(isset($url) && !empty($url) )
	@component('mail::button', ['url' => $url])
	{{ (isset($url_text) && !empty($url_text)) ? $url_text : __('Click here') }}
	@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
