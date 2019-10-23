@extends('layouts.main')
@section('content')

<div id="welecome">
    <section class="section">
        <div class="container" style="padding-top:100px;">
            <div class="notification is-primary">
                <p class="center title is-1">It's {{ $now }}</p>
                <p class="center title is-1">Welcome back, 邢 亜豪!</p>
                <p class="center title is-1">What do you want to create?</p>
            </div>
        </div>
    </section>
</div>



@endsection
