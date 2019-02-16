<header id="app-header" class="mdc-top-app-bar mdc-top-app-bar--fixed">
    <div class="mdc-top-app-bar__row">
        {{-- Left-hand section --}}
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <a
                href="#"
                class="material-icons mdc-top-app-bar__navigation-icon mq-tablet"
            >
                menu
            </a>

            {{-- Icon, phone --}}
            @linkbutton([
                'classes' => 'mdc-icon-button mq-phone',
                'href' => '/'
            ])
                <img aria-hidden="true" alt="app-icon" src="{{asset('/images/brand/32h/Icon_x32.png')}}"/>
            @endlinkbutton

            {{-- Icon, tablet and desktop --}}
            @linkbutton([
                'classes' => 'mdc-button mdc-button--unelevated mq-not-phone',
                'href' => '/'
            ])
                <img class="mdc-button__icon" alt="app-icon" aria-hidden="true" src="{{asset('/images/brand/32h/Icon_x32.png')}}"/>
                @lang('app.name')
            @endlinkbutton
        </section>

        {{-- Right-hand section --}}
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
            @foreach (config('web.links') as $key => $link)
                @linkbutton([
                    'tooltip' => $link['name'],
                    'classes' => 'mdc-icon-button mdc-button--unelevated mq-tablet-only',
                    'href' => $link['href']
                ])
                    <i class="{{ $link['icon'] }} fa-sm" aria-hidden="true"></i>
                @endlinkbutton

                @linkbutton([
                    'classes' => 'mdc-button mdc-button--unelevated mq-not-tablet',
                    'href' => $link['href']
                ])
                    <i class="mdc-button__icon {{ $link['icon'] }}" aria-hidden="true"></i>
                    <span>{{ $link['name'] }}</span>
                @endlinkbutton
            @endforeach

            @component('layouts.partials.user_menu')
            @endcomponent
        </section>
    </div>
</header>
