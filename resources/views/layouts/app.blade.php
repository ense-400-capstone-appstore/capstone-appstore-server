<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') · @lang('app.name')</title>
        {{-- Favicons --}}
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=eEGjQP3keR">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=eEGjQP3keR">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=eEGjQP3keR">
        <link rel="manifest" href="/site.webmanifest?v=eEGjQP3keR">
        <link rel="shortcut icon" href="/favicon.ico?v=eEGjQP3keR">
        <meta name="msapplication-TileColor" content="#dadff7">
        <meta name="theme-color" content="#6075E0">

        {{-- Compiled application styles --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- Custom styles --}}
        @yield('css')
    </head>

    <body>
        @component('layouts.partials.header')
        @endcomponent

        {{-- Default drawer. Individual views may overwrite with their own sidebar --}}
        @section('drawer')
            @component('layouts.partials.drawer')
            @endcomponent
        @show

        {{-- Content of the view extending this layout --}}
        <div id="app-content-wrapper">
            @yield('html')
        </div>

        @component('layouts.partials.footer')
        @endcomponent

        {{-- Compiled application scripts --}}
        <script src="{{ mix('js/app.js') }}"></script>

        {{-- reCAPTCHA script. Only load if key was set up --}}
        @if(config('recaptcha.v3_site_key'))
            <script src="https://www.google.com/recaptcha/api.js?render={{ config('recaptcha.v3_site_key') }}"></script>

            <script>
                initRecaptcha("{{ config('recaptcha.v3_site_key') }}");
            </script>
        @endif

        {{-- Custom scripts --}}
        @yield('js')
    </body>
</html>


