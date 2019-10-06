@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{ asset('/css/-debug.css') }}">

<section class="section">
    <div class="container">
        <form action="#" class="form">
            <div class="field">
                <div class="control has-icons-left">

                    <input type="text" class="input is-success  is-rounded" placeholder="Search somthing">
                    <span class="icon is-small is-left">
                        <i class="fa fa-lg fa-github"></i>
                    </span>
                </div>
            </div>

        </form>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-one-third center">
                <div class="notification">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-left">
                                    <figure class="image is-48x48">
                                        <img src="https://bulma.io/images/placeholders/96x96.png"
                                            alt="Placeholder image">
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <p class="title is-4">John Smith</p>
                                    <p class="subtitle is-6">@johnsmith</p>
                                </div>
                            </div>

                            <div class="content">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                                <a href="#">#css</a> <a href="#">#responsive</a>
                                <br>
                                <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="column is-one-third center">
                Second column
            </div>
            <div class="column is-one-third center">
                Third column
            </div>
        </div>

    </div>
</section>
@endsection
