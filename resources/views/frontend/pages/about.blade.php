@extends('layouts.main')
@section('content')


<div id="about">
    @if (session('status'))
    <div id="mail-notification" class="notification is-primary is-small">
        <button id="notification-close" class="delete"></button>
        {{ session('status') }}
    </div>
    @endif
    <About :basic='basic'></About>
    @include('frontend.partials.form')
</div>
@endsection
