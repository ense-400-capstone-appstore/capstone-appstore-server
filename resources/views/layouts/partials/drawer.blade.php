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

            @if (Auth::check())
                <h6 class="mdc-list-group__subheader">Categories</h6>

                @foreach (App\Category::take(5)->get() as $category)
                    <a
                        class="mdc-list-item"
                        href="/categories/{{ $category->id }}"
                    >
                        <i
                            class="mdc-list-item__graphic material-icons"
                            aria-hidden="true"
                        >{{ $category->icon ?? 'folder' }}</i>

                        <span class="mdc-list-item__text">{{ $category->name }}</span>
                    </a>
                @endforeach

                <a
                    class="mdc-list-item"
                    href="/categories"
                >
                    <i
                        class="mdc-list-item__graphic material-icons"
                        aria-hidden="true"
                    >more_horiz</i>

                    <span class="mdc-list-item__text">More Categories</span>
                </a>

                <hr class="mdc-list-divider">
            @endif

            <h6 class="mdc-list-group__subheader">Actions</h6>

            {{-- Login/Logout button --}}
            @if (Auth::check())
                <a
                    class="mdc-list-item"
                    href="/users/{{ Auth::user()->id }}"
                >
                    <i
                        class="mdc-list-item__graphic material-icons"
                        aria-hidden="true"
                    >person</i>
                    <span class="mdc-list-item__text">Profile</span>
                </a>

                @if (Auth::user()->isAdmin())
                    <a
                        class="mdc-list-item"
                        href="/admin"
                    >
                        <i
                            class="mdc-list-item__graphic material-icons"
                            aria-hidden="true"
                        >settings_applications</i>
                        <span class="mdc-list-item__text">Admin</span>
                    </a>
                @endif

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
