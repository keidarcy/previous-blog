@component('mail::message')
# Introduction

Got a message

User : {{ $user->name }}<br>
----------
Email : {{ $user->email }}<br>
----------
{{ $user->message }}

@component('mail::button', ['url' => ''])
:)
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
