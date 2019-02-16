<aside id="app-drawer" class="mdc-drawer mdc-drawer--modal">
    <div class="mdc-drawer__header">
        <h3 class="mdc-drawer__title">
            <img aria-hidden="true" alt="app-logo" src="{{asset('/images/brand/64h/Logo_x64.png')}}"/>
        </h3>
    </div>

    <hr class="mdc-list-divider">

    <div class="mdc-drawer__content">
        <nav class="mdc-list">
            <h6 class="mdc-list-group__subheader">Quick Links</h6>
            @foreach (config('web.links') as $key => $link)
                {{-- TODO: Select link for the current URL instead of home --}}
                <a
                    class="mdc-list-item {{  $key == 'home' ? 'mdc-list-item--activated' : '' }}"
                    href="{{ $link['href'] }}"
                >
                    <i
                        class="mdc-list-item__graphic {{ $link['icon'] }}"
                        aria-hidden="true"
                    ></i>

                    <span class="mdc-list-item__text">{{ $link['name'] }}</span>
                </a>
            @endforeach

            <hr class="mdc-list-divider">
            <h6 class="mdc-list-group__subheader">Actions</h6>

            {{-- Login/Logout button --}}
            @if (Auth::check())
                <a
                    class="mdc-list-item"
                    href="/logout"
                >
                    <i
                        class="mdc-list-item__graphic fas fa-sign-in-alt"
                        aria-hidden="true"
                    ></i>
                    <span class="mdc-list-item__text">Logout</span>
                </a>
            @else
                <a
                    class="mdc-list-item"
                    href="/login"
                >
                    <i
                        class="mdc-list-item__graphic fas fa-sign-out-alt"
                        aria-hidden="true"
                    ></i>
                    <span class="mdc-list-item__text">Login</span>
                </a>
            @endif
        </nav>
    </div>
</aside>

<div class="mdc-drawer-scrim"></div>
