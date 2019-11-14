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
</head>

<body>
    <div id="app">
        <v-app>
            <header-bar :basic='basic'></header-bar>

            @yield('content')
        </v-app>
        <footer-bar :basic='basic'></footer-bar>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
