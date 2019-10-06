<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/images/logo-no-background.png') }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hi,there! yang zong niu bi</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/-debug.css') }}">

</head>

<body>
    <div id="app">
        {{-- overlay --}}
        <div class="overlay moblie" :style="overlay">
            <div class="overlay-content">
                <a href="#" class=" hovered-link">HOME</a>
                <a href="#" class=" hovered-link">BLOG</a>
                <a href="#" class=" hovered-link">ABOUT</a>
            </div>
            <div class="center bottom overlay-icon">
                <figure class="media-left">
                    <span class="icon has-text-light is-large hovered-link">
                        <i class="fa fa-3x fa-facebook-square"></i>
                    </span>
                </figure>
                <figure class="media-left">
                    <span class="icon has-text-light is-large hovered-link">
                        <i class="fa fa-3x fa-github"></i>
                    </span>
                </figure>
                <figure class="media-left">
                    <span class="icon has-text-light is-large hovered-link">
                        <i class="fa  fa-3x fa-wechat"></i>
                    </span>
                </figure>
            </div>
        </div>
        {{-- overlay --}}





        <section class="hero">
            {{-- navbar --}}
            <div class="hero-head ">
                <div class="narbar columns is-mobile is-marginless has-text-weight-bold has-background-dark">
                    <div class="column center">

                        <img src=" {{asset('/images/logo-no-background.png')}} " alt="logo" class="logo mobile-logo" />
                        <div style="flex-direction: row">
                            <p class="center has-text-white">xyyyo</p>
                            <p class="center has-text-white mobile mobile-text">no template</p>
                            <p class="center has-text-white desktop">no template life</p>
                        </div>
                    </div>
                    <div class="column center desktop">
                        <p class="navbar-item has-text-white hovered-link">HOME</p>
                        <p class="navbar-item has-text-white hovered-link">BLOG</p>
                        <p class="navbar-item has-text-white hovered-link">ABOUT</p>
                    </div>
                    <div class="column right">
                        <button @click='clickBurger' :class="burger" class="hamburger hamburger--emphatic mobile"
                            type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        {{-- navbar --}}

        @yield('content')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>


    {{-- footer --}}
    <footer class="footer center footer-height has-text-weight-bold has-background-dark">
        <div style="flex-direction: row">
            <div class="center">
                <figure class="media-left">
                    <span class="icon has-text-light is-large hovered-link">
                        <i class="fa fa-lg fa-facebook-square"></i>
                    </span>
                </figure>
                <figure class="media-left">
                    <span class="icon has-text-light is-large hovered-link">
                        <i class="fa fa-lg fa-github"></i>
                    </span>
                </figure>
                <figure class="media-left">
                    <span class="icon has-text-light is-large hovered-link">
                        <i class="fa  fa-lg fa-wechat"></i>
                    </span>
                </figure>
            </div>
            <div>
                <p class="center mobile-text"> © Copyright 2019 xyyyo</p>
            </div>
        </div>
    </footer>
    {{-- footer --}}
</body>

</html>
