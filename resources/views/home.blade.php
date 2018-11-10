@extends('layouts.app')

@section('title', 'Home')

@section('local_styles')
    <link rel="stylesheet" href="{{ asset('css/views/home.css') }}">
@endsection

@section('content')
    <div id="jumbotron" class="section mdl-typography--text-center">
        <div></div>

        <div>
            <h1 class="app-title">@lang('app.name')</h1>
            <h3>A Private Android Appstore</h3>
        </div>

        <button id="jumbotron-scroll-down" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>

    <div id="what-is-this" class="section mdl-typography--text-center">
        <div>
            <h2>What is this?</h2>

            This is an undergraduate Capstone project for the University of Regina. 
            It is a basic private appstore for the Android operating system.
        </div>

        <div>
            <h4>Source Code</h4>
            <p>This project is open-source and all of the source code is available on GitHub!</p>

            <a href="{{config('web.links.github.href')}}">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">
                    <i class="fab fa-github"></i> Source Code
                </button>
            </a>
        </div>

        <div>
            <h4>The team</h4>

            <div id="made-by" class="mdl-grid">
                <div
                    class="mdl-cell mdl-cell--4-col mdl-cell--12-col-mobile mdl-typography--text-center center-justified"
                    data-tippy="Daniel Shevtsov"
                    data-tippy-arrow="true"
                >
                    <a href="https://github.com/shevtsod">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">
                            <i class="fab fa-github"></i> @shevtsod
                        </button>
                    </a>
                </div>

                <div
                    class="mdl-cell mdl-cell--4-col mdl-cell--12-col-mobile mdl-typography--text-center center-justified"
                    data-tippy="Chengyu Lou"
                    data-tippy-arrow="true"
                >
                    <a href="https://github.com/oscar666666">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">
                            <i class="fab fa-github"></i> @oscar666666
                        </button>
                    </a>
                </div>

                <div
                    class="mdl-cell mdl-cell--4-col mdl-cell--12-col-mobile mdl-typography--text-center center-justified"
                    data-tippy="Uys Kriek"
                    data-tippy-arrow="true"
                >
                    <a href="https://github.com/Uyser">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect">
                            <i class="fab fa-github"></i> @Uyser
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="features">
        <div class="mdl-grid">
            @for ($i = 1; $i <= 3; $i++)
                <div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet">
                    <div class="feature-card mdl-card mdl-shadow--4dp">
                        <div class="mdl-card__title center-justified">
                            <h2 class="mdl-card__title-text">Feature {{ $i }}</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            Placeholder text for feature, this is under construction.
                        </div>
                        <div class="mdl-card__actions mdl-card--border">
                            <a class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" href="#">
                            Link {{ $i }}
                            </a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection

@section('local_scripts')
    <script src="{{ asset('js/views/home.js') }}"></script>
@endsection
