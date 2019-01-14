@extends('layouts.app')

@section('title', 'Home')

@section('html')
    <div id="page-home">
        <div id="home-jumbotron" class="home-section">
            <div></div>

            <div>
                <h1 class="home-title">@lang('app.name')</h1>
                <h3>@lang('app.slogan')</h3>

                @button([
                    'id' => 'home-jumbotron-button--get-app',
                    'classes' => 'home-jumbotron-button mdc-button mdc-button--raised',
                    'onClick' => "window.location.href='https://github.com/matryoshkadoll/matryoshka-app/releases'"
                ])
                    <i class="mdc-button__icon fas fa-arrow-down"></i>
                    <span clas="mdc-button__label">Get the app</span>
                @endbutton

                @button([
                    'classes' => 'home-jumbotron-button mdc-button mdc-button--unelevated',
                    'onClick' => "window.location.href='" . config('web.links.docs.href') . "'"
                ])
                    <i class="mdc-button__icon {{ config('web.links.docs.icon') }}"></i>
                    <span class="mdc-button__label">Read the Docs</span>
                @endbutton
            </div>

            @button([
                'id' => 'home-jumbotron-scroll-down',
                'classes' => 'mdc-fab',
                'tooltip' => 'Scroll down to learn more!'
            ])
                <i class="fas fa-chevron-down"></i>
            @endbutton
        </div>

        <div id="home-what-is-this" class="home-section mdl-typography--text-center">
            <div>
                <h2>What is this?</h2>

                This is an undergraduate Capstone project for the University of Regina.
                It is a basic private appstore for the Android operating system.
            </div>

            <div>
                <h4>Source Code</h4>
                <p>This project is open-source and all of the source code is available on GitHub!</p>

                @button([
                    'classes' => 'mdc-button mdc-button--raised',
                    'tooltip' => 'See the source code on GitHub!',
                    'onClick' => "window.location.href='" . config('web.links.github.href') . "'"
                ])
                    <i class="mdc-button__icon fab fa-github"></i>
                    <span class="mdc-button__label">Source Code</span>
                @endbutton
            </div>

            <div>
                <h4>The Team</h4>

                <div id="home-made-by">
                    @button([
                        'classes' => 'mdc-button mdc-button--raised',
                        'tooltip' => 'Daniel Shevtsov',
                        'onClick' => "window.location.href='https://github.com/shevtsod'"
                    ])
                        <i class="mdc-button__icon fab fa-github"></i>
                        <span class="mdc-button__label">@shevtsod</span>
                    @endbutton

                    @button([
                        'classes' => 'mdc-button mdc-button--raised',
                        'tooltip' => 'Chengyu Lou',
                        'onClick' => "window.location.href='https://github.com/oscar666666'"
                    ])
                        <i class="mdc-button__icon fab fa-github"></i>
                        <span class="mdc-button__label">@oscar666666</span>
                    @endbutton

                    @button([
                        'classes' => 'mdc-button mdc-button--raised',
                        'tooltip' => 'Uys Kriek',
                        'onClick' => "window.location.href='https://github.com/Uyser'"
                    ])
                        <i class="mdc-button__icon fab fa-github"></i>
                        <span class="mdc-button__label">@uyser</span>
                    @endbutton
                </div>
            </div>
        </div>

        <div id="home-features">
            <div class="mdc-layout-grid">
                <div class="mdc-layout-grid__inner">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-12-phone">
                            @card([
                                'isTextCard' => 'true'
                            ])
                                <div class="mdc-card__media mdc-card__media--16-9">
                                    <div class="mdc-card__media-content">
                                        Feature {{ $i }}
                                    </div>
                                </div>
                                <button class="mdc-button mdc-card__action mdc-card__action--button">
                                    <span class="mdc-button__label">Link {{ $i }}</span>
                                </button>
                            @endcard
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
