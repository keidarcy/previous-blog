@extends('layouts.main')
@section('content')

<div id="blog" data-aos="fade-up">
    <section class="section">
        <div class="container">
            <form action="#" class="form">
                <div class="field">
                    <div class="control has-icons-left has-icons-right">
                        <input type="text" class="input is-large desktop" placeholder="What do you like ;) "
                            v-model="textSearch" :class="[articalsFilter.length==0 ? 'is-danger' : 'is-success']">
                        <span class=" icon is-large is-left desktop">
                            <i class="fa-2x fab fa-searchengin"></i>
                        </span>
                        <input type="text" class="input is-medium mobile" placeholder="What do you like ;) "
                            v-model="textSearch" :class="[articalsFilter.length==0 ? 'is-danger' : 'is-success']">
                        <span class="icon is-left mobile">
                            <i class="fab fa-searchengin"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('frontend.partials.articals')
</div>
@endsection
