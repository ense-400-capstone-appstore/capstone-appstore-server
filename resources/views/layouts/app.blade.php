<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@lang('app.name') - @yield('title')</title>
        {{-- Compiled application styles --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('local_styles')
    </head>

    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            @component('layouts.partials.header')
            @endcomponent
            
            {{-- Default drawer. Individual views may overwrite with their own sidebar --}}
            @section('drawer')
                @component('layouts.partials.drawer')
                @endcomponent
            @show

            {{-- Content of the view extending this layout --}}
            <main class="mdl-layout__content">
                <div class="page-content">
                    @yield('content')
                </div>

                @component('layouts.partials.footer')
                @endcomponent
            </main>
        </div>

        {{-- Material Design Lite https://getmdl.io/ --}}
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        {{-- Compiled application scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('local_scripts')
    </body>
</html>


