@extends('layouts.app')

@section('title', 'Home')

@section('local_styles')
    <style>
        h1.app-title {
            font-size: 64px;
        }

        .feature-card {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="mdl-cell mdl-cell--12-col mdl-typography--text-center">
        <h1 class="mdl-card__title-text center-justified app-title">@lang('app.name')</h1>
    </div>

    <div class="mdl-cell mdl-cell--4-col">
        <div class="feature-card mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Feature 1</h2>
            </div>
            <div class="mdl-card__supporting-text">
                Placeholder text for feature, this is under construction.
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="#">
                Link 1
                </a>
            </div>
        </div>
    </div>

    <div class="mdl-cell mdl-cell--4-col">
        <div class="feature-card mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Feature 2</h2>
            </div>
            <div class="mdl-card__supporting-text">
                Placeholder text for feature, this is under construction.
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="#">
                Link 1
                </a>
            </div>
        </div>
    </div>

    <div class="mdl-cell mdl-cell--4-col">
        <div class="feature-card mdl-card mdl-shadow--4dp">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Feature 3</h2>
            </div>
            <div class="mdl-card__supporting-text">
                Placeholder text for feature, this is under construction.
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="#">
                Link 1
                </a>
            </div>
        </div>
    </div>
@endsection
