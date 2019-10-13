@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{ asset('/css/-debug.css') }}">
<main>

    <section class="section">
        <div class="container">
            <div class="mobile-changing-words changing-words has-text-weight-bold center tooltip is-tooltip-bottom is-family-code"
                data-tooltip="WHY NOT TYPE SOME YOUR WORDS!" style="padding-top:100px;"></div>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="field">
                        <div class="control has-icons-left">

                            <input class="input my-input is-success is-rounded is-large desktop" type="text"
                                placeholder="ADD SOME MAGIC TO ME" />
                            <input class="input my-input is-success is-rounded is-medium mobile" type="text"
                                placeholder="ADD SOME MAGIC TO ME" />
                            <span class="icon is-large is-left">
                                <i class="fas fa-theater-masks"></i>
                            </span>


                            <div class="buttons center" style="padding-top:80px;">
                                <a class="my-button-2 button add-words is-uppercase">add words</a>
                                <a href="{{ config('frontend.inside-link.blog') }}" class="my-button button">EXPLORE</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</main>
@endsection
