@extends('layouts.main')
@section('content')

<div class="center" style="padding-top:60px;">
    <div class="media center">
        <div class="media-left desktop">
            <figure class="image">
                <img src="{{asset('/images/alice-and-cat.png')}}" alt="">
            </figure>
        </div>
        <div class="media-content">
            <div class="mobile">
                <figure class="image">
                    <img src="{{asset('/images/alice-and-cat.png')}}" alt="">
                </figure>
            </div>
            <p class="title is-3 center">404</p>
            <p class="title is-4 center">you seem to be lost here </p>
            <p class="subtitle is-6 center ">let me guide you somewhere
            </p>
            <div class="buttons center" style="padding-top:10px;">
                <a href="{{ config('frontend.inside-link.home') }}" class="my-button button">believe cat</a>
                <a href="https://artsandculture.google.com/explore" class="my-button-2 button">run away</a>
            </div>

        </div>
    </div>
</div>



</main>
@endsection
