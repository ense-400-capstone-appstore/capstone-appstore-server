<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@lang('app.name') - @yield('title')</title>

        <!-- Material Design Lite https://getmdl.io/ -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <!-- Compiled application styles -->
        <link rel="stylesheet" href="css/app.css">
        @yield('local_styles')
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">@lang('app.name')</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="https://github.com/ense-400-capstone-appstore">GitHub</a>
                    <a class="mdl-navigation__link" href="https://ense-400-capstone-appstore.github.io/capstone-appstore-docs/">Docs</a>
                    <a class="mdl-navigation__link" href="/admin">Administration</a>
                </nav>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">@lang('app.name')</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="https://github.com/ense-400-capstone-appstore">GitHub</a>
                    <a class="mdl-navigation__link" href="https://ense-400-capstone-appstore.github.io/capstone-appstore-docs/">Docs</a>
                    <a class="mdl-navigation__link" href="/admin">Administration</a>
                </nav>
            </div>

            <main class="mdl-layout__content" style="display: flex; flex-direction: column;">
                <div class="page-content" style="flex: 1 0 auto;">
                    <div class="mdl-grid">
                        @yield('content')
                    </div>
                </div>

                <footer class="mdl-mega-footer">
                <div class="mdl-mega-footer__middle-section">

                    <div class="mdl-mega-footer__drop-down-section">
                    <input class="mdl-mega-footer__heading-checkbox" type="checkbox" checked>
                    <h1 class="mdl-mega-footer__heading">Quick Links</h1>
                    <ul class="mdl-mega-footer__link-list">
                        
                        
                        
                        <li><a href="https://github.com/ense-400-capstone-appstore">GitHub</a></li>
                        <li><a href="https://ense-400-capstone-appstore.github.io/capstone-appstore-docs/">Docs</a></li>
                        <li><a href="/admin">Administration</a></li>
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

        <!-- Material Design Lite https://getmdl.io/ -->
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <!-- Compiled application scripts -->
        <script src="js/app.js"></script>
        @yield('local_scripts')
    </body>
</html>


