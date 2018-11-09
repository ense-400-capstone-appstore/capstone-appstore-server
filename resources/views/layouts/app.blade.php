<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@lang('app.name') - @yield('title')</title>

        {{-- Material Design Lite https://getmdl.io/ --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css" />
        {{-- Compiled application styles --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('local_styles')
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="mdl-layout__header mdl-layout--no-desktop-drawer-button">
                <div class="mdl-layout__header-row">
                <span class="mdl-layout-title mdl-layout--small-screen-only"><a href="/">@lang('app.name')</a></span>
                <div class="mdl-layout-spacer"></div>
                    {{-- Navigation for large screens --}}
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                        @component('partials.links', ['classes' => 'mdl-navigation__link'])
                        @endcomponent
                    </nav>
                    {{-- Navigation for small screens --}}
                    <nav class="mdl-navigation mdl-layout--small-screen-only">
                        <a 
                            id="login-link--small-screen-only" 
                            class="mdl-navigation__link" 
                            href="/login" 
                            data-tippy="Login"
                            data-tippy-arrow="true"
                        >
                            <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect">
                                <i class="fas fa-sign-in-alt"></i>
                            </button>
                        </a>
                    </nav>
                </div>
            </header>
            
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">@lang('app.name')</span>
                <nav class="mdl-navigation">
                    @component('partials.links', ['classes' => 'mdl-navigation__link', 'icons' => true])
                    @endcomponent
                </nav>
            </div>

            <main class="mdl-layout__content">
                <div class="page-content">
                    @yield('content')
                </div>

                <footer class="mdl-mega-footer">
                    <div class="mdl-mega-footer__middle-section">

                        <div class="mdl-mega-footer__drop-down-section">
                        <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
                        <h1 class="mdl-mega-footer__heading">Quick Links</h1>
                        <ul class="mdl-mega-footer__link-list">
                            @component('partials.links', ['classes' => 'mdl-navigation__link', 'icons' => true, 'list_items' => true])
                            @endcomponent
                        </ul>
                        </div>
                    </div>

                    <div class="mdl-mega-footer__bottom-section">
                        <div class="mdl-logo">@lang('app.name')</div>
                        <ul class="mdl-mega-footer__link-list">
                        <li><a href="https://ense-400-capstone-appstore.github.io/capstone-appstore-docs/help">Help</a></li>
                        <li><span>&copy; {{date("Y")}}</span></li>
                        </ul>
                    </div>
                </footer>
            </main>
        </div>

        {{-- Material Design Lite https://getmdl.io/ --}}
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        {{-- Compiled application scripts --}}
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('local_scripts')
    </body>
</html>


