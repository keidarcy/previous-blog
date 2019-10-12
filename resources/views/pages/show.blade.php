@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="{{ asset('/css/0debug.css') }}">
<div id="show">
    @include('blocks.big-pic')

    {{-- <section class="hero">
        <figure class="image">
            <img style="opacity: 0.7;-webkit-filter: blur(4px);filter: blur(4px);"
                src="https://www.w3schools.com/css/img_5terre_wide.jpg">
        </figure>

    </section> --}}



    <section class="section">
        <div class="container">
            <h1 class="center has-text-black is-1 is-size-1 has-text-black">HTML Ipsum Presents</h1>
            <h1>2019</h1>
            <div class="is-divider"></div>
            <p class="has-text-black"><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et
                malesuada
                fames ac turpis
                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                sit
                amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque
                sit
                amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                <code>commodo vitae</code>,
                ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci,
                sagittis
                tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

            <ul class="has-text-black">
                <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in,
                    diam. Sed arcu. Cras consequat.</li>
                <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu
                    erat.
                    Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</li>
                <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem
                    tristique
                    cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum
                    vulputate,
                    nunc.</li>
            </ul class="has-text-black">
            <p class="has-text-black"><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et
                malesuada
                fames ac turpis
                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                sit
                amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque
                sit
                amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                <code>commodo vitae</code>,
                ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci,
                sagittis
                tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

            <ul class="has-text-black">
                <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in,
                    diam. Sed arcu. Cras consequat.</li>
                <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu
                    erat.
                    Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</li>
                <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem
                    tristique
                    cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum
                    vulputate,
                    nunc.</li>
            </ul class="has-text-black">
            <p class="has-text-black"><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et
                malesuada
                fames ac turpis
                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                sit
                amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque
                sit
                amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                <code>commodo vitae</code>,
                ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci,
                sagittis
                tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

            <ul class="has-text-black">
                <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in,
                    diam. Sed arcu. Cras consequat.</li>
                <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu
                    erat.
                    Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</li>
                <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem
                    tristique
                    cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum
                    vulputate,
                    nunc.</li>
            </ul class="has-text-black">
            <p class="has-text-black"><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et
                malesuada
                fames ac turpis
                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                sit
                amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque
                sit
                amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                <code>commodo vitae</code>,
                ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci,
                sagittis
                tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

            <ul class="has-text-black">
                <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in,
                    diam. Sed arcu. Cras consequat.</li>
                <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu
                    erat.
                    Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</li>
                <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem
                    tristique
                    cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum
                    vulputate,
                    nunc.</li>
            </ul class="has-text-black">
            <p class="has-text-black"><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et
                malesuada
                fames ac turpis
                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                sit
                amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque
                sit
                amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                <code>commodo vitae</code>,
                ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci,
                sagittis
                tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

            <ul class="has-text-black">
                <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in,
                    diam. Sed arcu. Cras consequat.</li>
                <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu
                    erat.
                    Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</li>
                <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem
                    tristique
                    cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum
                    vulputate,
                    nunc.</li>
            </ul class="has-text-black">
            <p class="has-text-black"><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et
                malesuada
                fames ac turpis
                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero
                sit
                amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque
                sit
                amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed,
                <code>commodo vitae</code>,
                ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci,
                sagittis
                tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

            <ul class="has-text-black">
                <li>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in,
                    diam. Sed arcu. Cras consequat.</li>
                <li>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu
                    erat.
                    Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</li>
                <li>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem
                    tristique
                    cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</li>
                <li>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum
                    vulputate,
                    nunc.</li>
            </ul class="has-text-black">


        </div>
    </section>
</div>


@endsection
