@extends('layouts.main')
@section('content')
{{-- <link rel="stylesheet" href="{{ asset('/css/-debug.css') }}"> --}}
<main>
    <div class="content_">
        <div class="content__container">
            <p class="content__container__text has-text-weight-bold">
                Hello
            </p>
            <ul class="content__container__list">
                <li class="content__container__list__item has-text-weight-bold">world 🤖 !</li>
                <li class="content__container__list__item has-text-weight-bold">
                    <span class="has-text-primary">xy</span>yo 🐸 !
                </li>
                <li class="content__container__list__item has-text-weight-bold">wizard 🧙‍♀️</li>
                <li class="content__container__list__item has-text-weight-bold">lab 🧪 !</li>
            </ul>
        </div>
    </div>
</main>
@endsection
