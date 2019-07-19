@component('mail::message')
# Introduction
The body of your message.
The Laravel Message Email Test
<hr/>
{{$message}}
@component('mail::button', ['url' => url('/')])
Click Here To Go Website
<img src="https://www.almstba.com/imgcache/almastba.com_1388752178_473.jpg">
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
