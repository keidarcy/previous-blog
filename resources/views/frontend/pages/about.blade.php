@extends('layouts.main')
@section('content')


<div id="about">
    <About :basic='basic'></About>
    @include('frontend.partials.form')
</div>
@endsection
