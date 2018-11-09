@extends('layouts.app')

@section('title', 'Home')

@section('local_styles')
    <style>
        #jumbotron {
            width: 100%;
            height: 100vh;
            justify-content: space-around;
        }

        #jumbotron #jumbotron-scroll-down {
            margin: 20px auto;
        }

        #what-is-this {
            color: #fff;
            background-color: rgb(63,81,181);
            padding: 0 50px;
        }

        #what-is-this a {
            color: #fff;
        }

        .section {
            height: 50vh;

            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .feature-card {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div id="jumbotron" class="section mdl-typography--text-center">
        <div></div>

        <div>
            <h1 class="center-justified app-title">@lang('app.name')</h1>
            <h3 class="center-justified">A private Android Appstore</h3>
        </div>

        <button id="jumbotron-scroll-down" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
            <i class="fas fa-chevron-down"></i>
        </button>
    </div>

    <div id="what-is-this" class="section mdl-typography--text-center">
        <div class="center-justified">
            <h2>What is this?</h2>
        </div>
        <div>
            This is an undergraduate Capstone Project by
            <a href="https://github.com/shevtsod">@shevtsod</a>,
            <a href="https://github.com/oscar666666">@oscar666666</a>, and
            <a href="https://github.com/Uyser">@Uyser</a>
            for the University of Regina. It is a basic private appstore
            for the Android operating system.
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
                            <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="#">
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
    <script>
        (function() {
            $(document).on('click', '#jumbotron-scroll-down', function() {
                $('html, body').animate({
                    scrollTop: window.innerHeight
                }, 1500);
            });
        })();
    </script>
@endsection
