@extends('layouts.main')
@section('content')

<link rel="stylesheet" href="{{ asset('/css/-debug.css') }}">

<div id="about">

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="{{asset('/images/self-squar.png')}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">

                            <div class="content">
                                Hey there! I'm
                                <a href="https://www.facebook.com/profile.php?id=100010633425743">
                                    Xing Yahao
                                </a>, consectetur adipiscing elit.

                            </div>
                        </div>

                    </div>
                </div>
                <div class="column is-half">
                    <form action="#">
                        <div class="field">

                            <div class="control has-icons-left">
                                <input type="text" class="input is-success" placeholder="Name">
                                <span class="icon is-left">
                                    <i class="fa fa-lg fa-id-card"></i>
                                </span>
                            </div>

                        </div>
                        <div class="field">
                            <div class="control has-icons-left">
                                <input type="text" class="input is-success" placeholder="Email">
                                <span class="icon is-left">
                                    <i class="fa-lg fa fa-envelope"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <textarea class="textarea is-success  is-large" placeholder="🤗 Your Message"
                                    rows="10"></textarea>
                            </div>
                        </div>
                        <div class="center" style="padding-top: 3rem;">
                            <button class="my-button button">talk to me</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

    </section>
    @include('blocks.thanks')
</div>


@endsection
