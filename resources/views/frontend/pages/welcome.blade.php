@extends('layouts.main')
@section('content')

<div>
    <section class="section">
        <div class="container" style="padding-top:70px;">
            <div class="notification is-primary">
                <p class="center title is-1">It's {{ $now }}</p>
                <p class="center title is-1">Welcome back, 邢 亜豪!</p>
                <p class="center title is-1">What do you want to create?</p>
            </div>
            <div class="center">
                <a href="/canvas">
                    <button class="button is-large is-primary">Go!</button>
                </a>
            </div>
        </div>
    </section>
</div>



@endsection
