@extends('layouts.main')
@section('content')

<div id="show">
    @include('frontend.partials.big-pic')

    <section class="section">
        <div class="container">
            <div class="artical-hearder" data-aos="fade-up" data-aos-once="true">
                <h1 class="center has-text-black is-1 is-size-1 has-text-black">
                    {{ $post['post']['title'] }}</h1>
                <div class="center">
                    <span>{{ $post['post']['updated_at'] }}</span>
                    <div class="is-divider-vertical"></div>
                    <div class="tags">
                        @foreach ($post['tags'] as $tag)
                        <span class="tag is-info is-medium">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- @foreach ($post['topics'] as $topic)
            <span class="tag is-light is-large">{{ $topic }}</span>
            @endforeach --}}
            <div class="is-divider"></div>
            <div class="artical-body" data-aos="fade-up" data-aos-once="true">
                {{ $post['post']['body'] }}
            </div>
        </div>
    </section>



    <section class=" section" data-aos="fade-up" data-aos-once="true">
        <div class="container">
            <div class="is-divider"></div>
            @include('frontend.partials.more')
        </div>
    </section>


</div>


@endsection
