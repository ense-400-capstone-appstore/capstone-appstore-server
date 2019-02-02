@if (Auth::check())
    {{-- If user is authenticated, show the user menu --}}
    <div class="mdc-menu-surface--anchor">
        {{-- User icon, anchor for menu --}}
        @linkbutton([
            'id' => 'user-menu-button',
            'classes' => 'mdc-icon-button',
            'tooltip' => Auth::user()->name,
            'href' => '#'
        ])
            <img
                class="mdc-button__icon user-icon"
                src="/storage/{{ Auth::user()->avatar }}"
            />
        @endlinkbutton

        {{-- User Menu --}}
        <div id="user-menu" class="mdc-menu mdc-menu-surface" tabindex="-1">
            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                <li class="mdc-list-item mdc-list-item--disabled" role="menuitem">
                        <img
                            class="mdc-button__icon user-menu-icon"
                            src="/storage/{{ Auth::user()->avatar }}"
                            height="35px"
                            width="auto"
                        />
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    </span>
                </li>

                <hr class="mdc-list-divider">

                {{-- Link to user profile --}}
                <li class="mdc-list-item" role="menuitem">
                    <span class="mdc-list-item__text">Profile</span>
                </li>

                {{-- Link to admin page if user has admin role --}}
                @if ( Auth::user()->hasRole("admin"))
                    <li
                        class="mdc-list-item"
                        role="menuitem"
                        onclick="window.location.href='/admin'"
                    >
                        <span class="mdc-list-item__text">Admin</span>
                    </li>
                @endif

                {{-- Link to logout --}}
                <li
                    class="mdc-list-item"
                    role="menuitem"
                    onclick="window.location.href='/logout'"
                >
                    <span class="mdc-list-item__text">Logout</span>
                </li>
            </ul>
        </div>
    </div>
@else
    {{-- If user is unauthenticated, show a login button --}}
    @linkbutton([
        'classes' => 'mdc-button mdc-button--unelevated',
        'href' => '/login'
    ])
        <i class="mdc-button__icon fas fa-sign-in-alt" aria-hidden="true"></i>
        Login
    @endlinkbutton
@endif
