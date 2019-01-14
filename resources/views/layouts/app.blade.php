<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') - @lang('app.name')</title>
        {{-- Compiled application styles --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
        <div id="app-content">
            @yield('html')
        </div>

        @component('layouts.partials.footer')
        @endcomponent

        {{-- Compiled application scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
        {{-- Custom scripts --}}
        @yield('js')
    </body>
</html>


