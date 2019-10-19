@extends('layouts.main')
@section('content')

<div id="show">
    @include('frontend.partials.big-pic')

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-6 is-offset-one-quarter">
                    <div class="artical-hearder" data-aos="fade-up" data-aos-once="true">
                        <h1 class="center has-text-black is-1 is-size-1 is-size-3-mobile has-text-black">
                            {{ $data['post']['title'] }}</h1>
                        <div class="center desktop">
                            <figure class="image is-64x64" style="margin-right:40px;">
                                <img class="is-rounded" src="{{asset($basic->little_picture)}}" alt="ops">
                            </figure>
                            <span class="subtitle is-3" style="padding-top:20px;">{{ $basic->nick_name }}</span>
                            <div class="is-divider-vertical"></div>
                            <span>Published at : {{ $data['post']['updated_at'] }}</span>
                        </div>
                        <div class="mobile">
                            <div class="center" style="padding-top:20px;">
                                <figure class="image is-64x64">
                                    <img class="is-rounded" src="{{asset($basic->little_picture)}}" alt="ops">
                                </figure>
                            </div>
                            <div class="center" style="padding-top:20px;">
                                <span class="subtitle is-4">{{ $basic->nick_name }}</span></div>
                            <div class="center" style="padding-top:20px;">
                                <div>Published at : {{ $data['post']['updated_at'] }}</div>
                            </div>

                        </div>
                    </div>
                    <div class="is-divider"></div>
                    <div class="artical-body" data-aos="fade-up" data-aos-once="true">
                        {!! $data['post']['body'] !!}


                        {{-- <span class="tag is-info is-medium"><a
                                href="/posts/{{ $data['post']->topic->first()->slug }}">{{ $data['post']->topic->first()->name }}</a></span>
                        --}}
                        <div class="tags are-large">
                            @foreach ($data['tags'] as $tag)
                            <a href="/posts/{{ $tag->slug }}">
                                <span class="tag is-dark">{{ $tag->name }}</span></a>&nbsp;&nbsp;
                            @endforeach
                        </div>
                    </div>
                </div>
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
