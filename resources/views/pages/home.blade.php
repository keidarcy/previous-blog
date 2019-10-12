@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{ asset('/css/-debug.css') }}">
<main>
    <section class="section">
        <div class="container">
            <div class="mobile-changing-words changing-words has-text-weight-bold center tooltip is-tooltip-bottom is-family-code"
                data-tooltip="WHY NOT TYPE SOME WORDS!" style="padding-top:100px;"></div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="field">
                        <div class="control has-icons-left">
                            <input class="input my-input is-primary is-large" type="text"
                                placeholder="ADD SOME MAGIC TO ME🧙‍♀️❓" />
                            <span class="icon is-large is-left">
                                <i class="fa fa-magic"></i>
                            </span>
                            <section class="section">
                                <div class="buttons center" style="padding-top:10px;">
                                    <button class="my-button-2 button add-words">ADD</button>

                                    <a href="/blog">
                                        <button class="my-button button">EXPLORE</button>
                                    </a>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</main>
@endsection
