<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings['meta_title'] ?? '' }}</title>
    <meta name="description" content="{{ $settings['meta_description'] ?? '' }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @vite(['resources/css/app.scss'])
    @vite(['resources/js/app.js'])
    <link rel="icon" href="{{ asset('assets/favicon.png') }}">
</head>

<body>
    <div class="main">
        <x-header/>

        <div class="content" id="content">
            @yield('content')
            <div class="push"></div>
        </div>

        @include('partials._cookie-notice')

        @if (!View::hasSection('disableFooter'))
            <x-footer />
        @endif
    </div>
</body>

</html>
