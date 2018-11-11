<header class="mdl-layout__header mdl-layout--no-desktop-drawer-button">
    <div class="mdl-layout__header-row">
    <span class="mdl-layout-title mdl-layout--small-screen-only"><a href="/">@lang('app.name')</a></span>
    
    <div class="mdl-layout-spacer"></div>
        {{-- Navigation for large screens --}}
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            @component('partials.links', ['classes' => 'mdl-navigation__link'])
            @endcomponent

            @if (Auth::check())
                <a class="mdl-navigation__link" href="{{ config('web.links.logout.href') }}">
                    @if (isset($icons))
                        <i class="{{ config('web.links.logout.icon') }}"></i>
                    @endif
                    {{ config('web.links.logout.name') }}
                </a>
            @else
                <a class="mdl-navigation__link" href="{{ config('web.links.login.href') }}">
                    @if (isset($icons))
                        <i class="{{ config('web.links.login.icon') }}"></i>
                    @endif
                    {{ config('web.links.login.name') }}
                </a>
            @endif
        </nav>
        {{-- Navigation for small screens --}}
        <nav class="mdl-navigation mdl-layout--small-screen-only">
            @if (Auth::check())
                <a 
                    id="login-link--small-screen-only" 
                    class="mdl-navigation__link" 
                    href="{{ config('web.links.logout.href') }}" 
                    data-tippy="{{ config('web.links.logout.name') }}"
                    data-tippy-arrow="true"
                >
                    <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect">
                        <i class="{{ config('web.links.logout.icon') }}"></i>
                    </button>
                </a>
            @else
                <a 
                    id="login-link--small-screen-only" 
                    class="mdl-navigation__link" 
                    href="{{ config('web.links.login.href') }}" 
                    data-tippy="{{ config('web.links.login.name') }}"
                    data-tippy-arrow="true"
                >
                    <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect">
                        <i class="{{ config('web.links.login.icon') }}"></i>
                    </button>
                </a>
            @endif
        </nav>
    </div>
</header>
