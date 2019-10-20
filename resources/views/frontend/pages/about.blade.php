@extends('layouts.main')
@section('content')
{{-- <link rel="stylesheet" href="{{ asset('./css/debug.css') }}"> --}}
<div id="about">
    @if (session('status'))
    <div id="mail-notification" class="notification is-success is-small">
        <button id="notification-close" class="delete"></button>
        {{ session('status') }}
    </div>
    @endif

    @include('frontend.partials.dance')
                <section class="section" style="padding-top:10rem;" data-aos="fade-up">
        <div class="container center">
            <h1 class="title is-1">{{ $basic->greet }}</h1>
        </div>
    </section>
    <section class="section" style="padding-top:10rem;">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <div class="card-image" data-aos="fade-left">
                            <figure class="image is-4by3">
                                <img src="{{asset($basic->big_picture)}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content" data-aos="fade-left">
                            <div class="content">
                                Hi! My name is
                                <a href="{{ config('forntend.sms.facebook') }}">
                                    {{ $basic->full_name }} ( {{ $basic->chinese_name }} )
                                </a>, {{ $basic->introduction }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" style="padding-top:8rem;" data-aos="fade-right">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    @include('frontend.partials.form')
                </div>
            </div>
        </div>
        </section>

    @include('frontend.partials.thanks')
</div>
@endsection
