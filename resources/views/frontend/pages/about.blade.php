@extends('layouts.main')
@section('content')

<div id="about">
    @if (session('status'))
    <div class="notification is-success is-small">
        <button class="delete"></button>
        {{ session('status') }}
    </div>
    @endif
    <section class="section" style="padding-top:10rem;" data-aos="fade-in">
        <div class="container center">
            <h1 class="title is-1">Hey, there!</h1>
        </div>
    </section>
    <section class="section" style="padding-top:10rem;" data-aos="fade-left">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-3">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="{{asset('/images/self-squar.png')}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                Hey there! I'm
                                <a href="{{ config('forntend.sms.facebook') }}">
                                    Xing Yahao
                                </a>, consectetur adipiscing elit.

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" style="padding-top:10rem;" data-aos="fade-right">
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
