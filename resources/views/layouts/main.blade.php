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
    <style>
        .chat-boy {
            position: absolute;
            right: 0%;
            bottom: 20%;
        }
    </style>
</head>

<body>
    <div id="app">
        <v-app>
            <header-bar></header-bar>

            @yield('content')
            <div class="chat-boy">
                <chat-bot></chat-bot>
            </div>
            <footer-bar></footer-bar>
        </v-app>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
