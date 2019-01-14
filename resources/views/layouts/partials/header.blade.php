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
            @button([
                'classes' => 'mdc-icon-button mq-phone',
                'onClick' => "window.location.href='/'"
            ])
                <img aria-hidden="true" src="{{asset('/images/brand/32h/Icon_x32.png')}}"/>
            @endbutton

            {{-- Icon, tablet and desktop --}}
            @button([
                'classes' => 'mdc-button mdc-button--unelevated mq-not-phone',
                'onClick' => "window.location.href='/'"
            ])
                <img class="mdc-button__icon" aria-hidden="true" src="{{asset('/images/brand/32h/Icon_x32.png')}}"/>
                @lang('app.name')
            @endbutton
        </section>

        {{-- Right-hand section --}}
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
            @foreach (config('web.links') as $key => $link)
                @button([
                    'tooltip' => $link['name'],
                    'classes' => 'mdc-icon-button mdc-button--unelevated mq-tablet-only',
                    'onClick' => "window.location.href='" . $link['href'] . "'"
                ])
                    <i class="{{ $link['icon'] }} fa-sm" aria-hidden="true"></i>
                @endbutton

                @button([
                    'classes' => 'mdc-button mdc-button--unelevated mq-not-tablet',
                    'onClick' => "window.location.href='" . $link['href'] . "'"
                ])
                    <i class="mdc-button__icon {{ $link['icon'] }}" aria-hidden="true"></i>
                    <span>{{ $link['name'] }}</span>
                @endbutton
            @endforeach

            @component('layouts.partials.user_menu')
            @endcomponent
        </section>
    </div>
</header>
