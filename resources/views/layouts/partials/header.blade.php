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
