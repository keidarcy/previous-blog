@extends('layouts.main')

@section('content')
<section class="section">
    <div class="container">
        <div class="row justify-content-center center">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <label for="email" class="center">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="input @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="center">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="input @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                            </div>
                        </div>

                        <div class="center">
                            <button type="submit" class="button">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<Login></Login>
@endsection
