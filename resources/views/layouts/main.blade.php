<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset(config('frontend.asset.favicon')) }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>xyyolab👨‍🔬🔥</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>
    <div id="app">
        <div id="header">
            {{-- overlay --}}
            <div class="overlay moblie" :style="overlay">
                <div class="overlay-content">
                    <a href="{{ config('frontend.inside-link.home') }}"
                        class=" hovered-link has-text-weight-bold">HOME</a>
                    <a href="{{ config('frontend.inside-link.post') }}"
                        class=" hovered-link has-text-weight-bold">BLOG</a>
                    <a href="{{ config('frontend.inside-link.about') }}"
                        class=" hovered-link has-text-weight-bold">ABOUT</a>
                    <div style="padding-top:2px;">
                        <label class="switch-button mobile tooltip is-tooltip-bottom"
                            data-tooltip="Appearance Changing In Process 👨‍💻">
                            <input class="switch-input" type="checkbox" @auth checked="checked" @endauth>
                            <span class="switch-slider switch-round"></span>
                        </label>
                    </div>
                </div>

                <div class="center overlay-icon">
                    <figure class="media-left">
                        <span class="icon has-text-light is-large hovered-shadow">
                            <a href="{{ $basic->facebook }}">
                                <i class="fa-lg fab fa-facebook-square"></i>
                            </a>
                        </span>
                    </figure>

                    <figure class="media-left">
                        <span class="icon has-text-light is-large hovered-shadow">
                            <a href="{{ $basic->github }}">
                                <i class="fa-lg fab fa-github-square"></i>
                            </a>
                        </span>
                    </figure>

                    <figure class="media-left">
                        <span class="icon has-text-light is-large hovered-shadow tooltip is-tooltip-up" data-tooltip="{{ $basic->wechat }}">
                            <a href="{{ $basic->wechat }}">
                                <i class="fa-lg fab fa-weixin"></i>
                            </a>
                        </span>
                    </figure>
                </div>
            </div>
            {{-- overlay --}}




            {{-- header --}}
            <div class="header-section">
                <section class="hero">
                    <div class="hero-head ">
                        <div class="narbar columns is-mobile is-marginless has-text-weight-bold has-background-dark">

                            {{-- logo-start --}}
                            <div class="column left" style="z-index:11;">
                                <a href="{{ config('frontend.inside-link.home') }}">
                                    <img src=" {{asset(config('frontend.asset.logo'))}} " alt="logo"
                                        class="logo-pic" /></a>
                                <div style="flex-direction: row">
                                    <a href="{{ config('frontend.inside-link.home') }}">
                                        <div class="logo-word">
                                            <p class="logo-word-top-mobile left has-text-white mobile"><strong
                                                    class="has-text-primary is-4">xy</strong>yo</p>
                                            <p class="logo-word-top-desktop left has-text-white desktop"><strong
                                                    class="has-text-primary is-4">xy</strong>yo</p>
                                            <p class="logo-word-bottom-mobile left has-text-white mobile">Laboratory.
                                            </p>
                                            <p class="logo-word-bottom-desktop left has-text-white desktop">Laboratory.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            {{-- logo-end --}}


                            {{-- nav-start --}}
                            <div class="column center desktop">
                                <a href="{{ config('frontend.inside-link.home') }}">
                                    <p class="navbar-item has-text-white hovered-link">HOME</p>
                                </a>
                                <a href="{{ config('frontend.inside-link.post') }}">
                                    <p class=" navbar-item has-text-white hovered-link">BLOG</p>
                                </a>
                                <a href="{{ config('frontend.inside-link.about') }}">
                                    <p class="navbar-item has-text-white hovered-link">ABOUT</p>
                                </a>
                            </div>
                            {{-- nav-end --}}



                            <div class="column right">
                                <label class="switch-button desktop tooltip is-tooltip-left"
                                    data-tooltip="Appearance Changing In Process 👨‍💻">
                                    <input class="switch-input" type="checkbox" @auth checked="checked" @endauth>
                                    <span class="switch-slider switch-round"></span>
                                </label>
                                <button @click='clickBurger' :class="burger"
                                    class="hamburger hamburger--emphatic mobile" type="button">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- header --}}
            </div>
        </div>

        @yield('content')
    </div>





    {{-- footer-start --}}
    <footer class="footer center footer-height has-text-weight-bold has-background-dark">
        <div style="flex-direction: row">
            <div class="center">
                <figure class="media-left">
                    <a href="{{ $basic->facebook }}">
                        <span class="icon has-text-light is-large hovered-shadow">
                            <i class="fa-lg fab fa-facebook"></i>
                        </span>
                    </a>
                </figure>
                <figure class="media-left">
                    <a href="{{ $basic->github }}">
                        <span class="icon has-text-light is-large hovered-shadow">
                            <i class="fa-lg fab fa-github"></i>
                        </span>
                    </a>
                </figure>
                <figure class="media-left tooltip is-tooltip-up" data-tooltip="{{ $basic->wechat }}">
                    <a href="{{ $basic->wechat }}">

                        <span class="icon has-text-light is-large hovered-shadow">
                            <i class="fa-lg fab fa-weixin"></i>
                        </span>
                    </a>
                </figure>
            </div>
            <div>
                <p class="center is-size-6 is-size-7-mobile"> © Copyright 2019 &nbsp; {{ $basic->website }}
                </p>
            </div>
        </div>
    </footer>
    {{-- footer-end --}}
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
