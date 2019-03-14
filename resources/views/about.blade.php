@extends('layouts.app')

@section('title', 'Home')

@section('html')
<div id="page-home" class="page-content">

    {{-- Jumbotron --}}
    <div id="home-jumbotron" class="home-section">
        <div id="home-jumbotron-content" class="page-content-item">
            <div></div>

            <div>
                <h1 class="home-title">{{ strtoupper(__('app.name')) }}</h1>
                <h3>@lang('app.slogan')</h3>

                @linkbutton([
                    'id' => 'home-jumbotron-button--get-app',
                    'classes' => 'home-jumbotron-button mdc-button mdc-button--raised',
                    'href' => 'https://github.com/matryoshkadoll/matryoshka-app/releases',
                    'target' => '_blank'
                ])
                    <i class="mdc-button__icon fas fa-arrow-down"></i>
                    <span class="mdc-button__label">Get the app</span>
                @endlinkbutton

                @linkbutton([
                    'classes' => 'home-jumbotron-button mdc-button mdc-button--unelevated',
                    'href' => '/login'
                ])
                    <i class="mdc-button__icon fas fa-sign-in-alt" aria-hidden="true"></i>
                    <span class="mdc-button__label">Login / Sign Up</span>
                @endlinkbutton

                @linkbutton([
                    'classes' => 'home-jumbotron-button mdc-button mdc-button--unelevated',
                    'href' => config('web.links.docs.href'),
                    'target' => '_blank'
                ])
                    <i class="mdc-button__icon {{ config('web.links.docs.icon') }}"></i>
                    <span class="mdc-button__label">Read the Docs</span>
                @endlinkbutton
            </div>

            @linkbutton([
                'id' => 'home-jumbotron-scroll-down',
                'classes' => 'mdc-fab',
                'tooltip' => 'Scroll down to learn more!',
                'href' => '#'
            ])
                <i class="fas fa-chevron-down"></i>
            @endlinkbutton
        </div>
    </div>

    {{-- "What is this?" section --}}
    <div id="home-what-is-this" class="home-section">
        <div id="home-what-is-this-content" class="page-content-item">
            <div class="left">
                <img src={{asset('/images/brand/512h/Icon_x512.png')}} alt="Logo" />
            </div>

            <div class="right">
                <div>
                    <h2>What is this?</h2>

                    This is an undergraduate Capstone project for the University of Regina.
                    It is a basic private appstore for the Android operating system.
                </div>

                <div>
                    <h4>Source Code</h4>
                    <p>This project is open-source and all of the source code is available on GitHub!</p>

                    @linkbutton([
                        'classes' => 'mdc-button mdc-button--raised',
                        'tooltip' => 'See the source code on GitHub!',
                        'href' => config('web.links.github.href'),
                        'target' => '_blank'
                    ])
                        <i class="mdc-button__icon fab fa-github"></i>
                        <span class="mdc-button__label">Source Code</span>
                    @endlinkbutton
                </div>

                <div>
                    <h4>The Team</h4>

                    <div id="home-made-by">
                        @linkbutton([
                            'classes' => 'mdc-button mdc-button--raised',
                            'tooltip' => 'Daniel Shevtsov',
                            'href' => 'https://github.com/shevtsod',
                            'target' => '_blank'
                        ])
                            <i class="mdc-button__icon fab fa-github"></i>
                            <span class="mdc-button__label">@shevtsod</span>
                        @endlinkbutton

                        @linkbutton([
                            'classes' => 'mdc-button mdc-button--raised',
                            'tooltip' => 'Chengyu Lou',
                            'href' => 'https://github.com/oscar666666',
                            'target' => '_blank'
                        ])
                            <i class="mdc-button__icon fab fa-github"></i>
                            <span class="mdc-button__label">@oscar666666</span>
                        @endlinkbutton

                        @linkbutton([
                            'classes' => 'mdc-button mdc-button--raised',
                            'tooltip' => 'Uys Kriek',
                            'href' => 'https://github.com/Uyser',
                            'target' => '_blank'
                        ])
                            <i class="mdc-button__icon fab fa-github"></i>
                            <span class="mdc-button__label">@uyser</span>
                        @endlinkbutton
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
