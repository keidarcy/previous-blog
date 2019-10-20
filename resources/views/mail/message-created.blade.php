@component('mail::message')
# Hi, {{ $user_name }}

I got your message below.

**_{{ $user_message }}_**
--------
I will response it ASAP.
@component('mail::button',
['url' => 'https://artsandculture.google.com/explore',
'color' => 'success'])
Button to explore
@endcomponent

Thanks, hope you have a nice day :)<br>
{{ config('app.name') }}
@endcomponent
