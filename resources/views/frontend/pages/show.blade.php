@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="{{ asset('/css/0debug.css') }}">
<div id="show">
    @include('frontend.partials.big-pic')

    <section class="section">
        <div class="container">
            <h1 class="center has-text-black is-1 is-size-1 has-text-black">{{ $post['post']['title'] }}</h1>
            <span>{{ $post['post']['updated_at'] }}</span>
            @foreach ($post['tags'] as $tag)
            <span class="tag is-dark is-medium">{{ $tag->name }}</span>
            @endforeach
            {{-- @foreach ($post['topics'] as $topic)
            <span class="tag is-light is-large">{{ $topic }}</span>
            @endforeach --}}
            <div class="is-divider"></div>
            {{ $post['post']['body'] }}
        </div>
    </section>



    <section class="section">

        <div class="container">
            <div class="is-divider"></div>
            @include('frontend.partials.more')
        </div>
    </section>


</div>


@endsection
