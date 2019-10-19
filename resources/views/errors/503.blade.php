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
            <p class="title is-3 center">ERROR</p>
            <p class="title is-4 center">Sorry, something wrong happened</p>
            <p class="subtitle is-6 center ">I will fix it as soon as possible</p>
            <div class="buttons center" style="padding-top:10px;">
                <a href="{{ config('frontend.inside-link.home') }}" class="my-button button">go back to HP</a>
                <a href="https://artsandculture.google.com/explore" class="my-button-2 button">leave</a>
            </div>

        </div>
    </div>
</div>



</main>
@endsection
