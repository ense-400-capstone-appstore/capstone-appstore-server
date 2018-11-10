@extends('layouts.app')

@section('title', 'Login')

@section('local_styles')
    <link rel="stylesheet" href="{{ asset('css/views/login.css') }}">
@endsection

@section('content')
    <div class="mdl-grid">
        <div id="login-card-container" class="mdl-cell mdl-cell--3-offset-desktop mdl-cell--6-col mdl-cell--12-col-tablet mdl-typography--text-center center-justified">
            <div id="login-card" class="mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title center-justified">
                    <h2 class="mdl-card__title-text">Login</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form action="#" id="login">
                        @csrf
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="email">
                            <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" id="password">
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                    </form>
                </div>
                <div class="mdl-card__actions mdl-card--border center-justified">
                    <button 
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                        type="submit"
                        form="login"
                    >
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('local_scripts')
    <script src="{{ asset('js/views/login.js') }}"></script>
@endsection
