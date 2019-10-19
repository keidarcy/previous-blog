@extends('layouts.main')
@section('content')

<div id="posts" data-aos="fade-up">
    <section class="section">
        <div class="container">
            <div class="control has-icons-left has-icons-right">
                <input type="text" class="input is-large desktop" placeholder="Search for title ;) "
                    v-model="textSearch" :class="[articalsFilter.length==0 ? 'is-danger' : 'is-success']">
                <span class=" icon is-large is-left desktop">
                    <i class="fa-2x fab fa-searchengin"></i>
                </span>
                <input type="text" class="input is-medium mobile" placeholder="Search for title ;) "
                    v-model="textSearch" :class="[articalsFilter.length==0 ? 'is-danger' : 'is-success']">
                <span class="icon is-left mobile">
                    <i class="fab fa-searchengin"></i>
                </span>
            </div>
        </div>
    </section>
    <div v-if="about==''"></div>
    <div class="title is-4 center" v-else>posts about @{{ about }}</div>

    @include('frontend.partials.articals')
</div>
@endsection
