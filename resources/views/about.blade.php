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
            <div class="left mq-not-phone">
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

    {{-- Features section --}}
    <div id="home-features" class="home-section">
        <div class="page-content-item">
            <div class="left">
                <img src={{asset('/images/about/feature1.png')}} alt="Feature 1" />
            </div>

            <div class="right">
                <div>
                    <h2>A home for your apps</h2>

                    Manage installed apps and discover new apps through our sleek interface. Vendors can also use the same dashboard to create new apps and groups to share with their users.
                </div>
            </div>
        </div>

        <div class="page-content-item">
            <div class="left">
                <div>
                    <h2>Power for Admins</h2>

                    Administrators gain access to a separate dashboard made specifically for viewing the big picture. The dashboard is optimized for operations ranging from approving new apps to changing system-wide settings.
                </div>
            </div>

            <div class="right">
                <img src={{asset('/images/about/feature2.png')}} alt="Feature 2" />
            </div>
        </div>

        <div class="page-content-item">
            <div class="left">
                <img src={{asset('/images/about/feature3.png')}} alt="Feature 3" />
            </div>

            <div class="right">
                <div>
                    <h2>Handheld Convenience</h2>

                    Any app you have access to can be downloaded and updated through our very own mobile app. After signing up, you can manage all of your apps directly from your phone.
                </div>
            </div>
        </div>

        <div class="page-content-item">
            <div>
                <h2>Open Source!</h2>

                We believe that open-source software makes the world better for everyone. Matryoshka is available to use both on our hardware or, if you choose, on your own hardware on-premises. Simply visit our GitHub and download the latest version of the application, deploy it to your hardware, and your own private appstore is ready to go!
            </div>
        </div>
    </div>
</div>
@endsection
