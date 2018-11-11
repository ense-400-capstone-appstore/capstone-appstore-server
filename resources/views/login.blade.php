@extends('layouts.app')

@section('title', 'Login')

@section('local_styles')
    <link rel="stylesheet" href="{{ asset('css/views/login.css') }}">
@endsection

@section('content')
    <div id="login-grid" class="mdl-grid">
        @if ($errors->any())
            <div class="mdl-cell mdl-cell--12-col mdl-typography--text-center center-justified">
                <div id="errors-card" class="mdl-card mdl-shadow--4dp">
                    <div class="mdl-card__supporting-text">
                        <ul class="mdl-list">
                            @foreach ($errors->all() as $error)
                                <li class="mdl-list__item">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div id="login-card-container" class="mdl-cell mdl-cell--3-offset-desktop mdl-cell--6-col mdl-cell--12-col-tablet mdl-typography--text-center center-justified">
            <div id="login-card" class="mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title center-justified">
                    <h2 class="mdl-card__title-text">Login</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p>Don't have an account yet? Sign up in the box under this one!</p>
                    <form method="POST" action="login" id="login">
                        @csrf
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="email">
                            <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" name="password">
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <br>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                            <input type="checkbox" class="mdl-checkbox__input" name="remember" id="remember">
                            <span class="mdl-checkbox__label">Remember me</span>
                        </label>
                    </form>
                </div>
                <div class="mdl-card__actions mdl-card--border center-justified">
                    <button 
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                        type="submit"
                        form="login"
                    >
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mdl-grid">
        <div id="register-card-container" class="mdl-cell mdl-cell--3-offset-desktop mdl-cell--6-col mdl-cell--12-col-tablet mdl-typography--text-center center-justified">
            <div id="register-card" class="mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title center-justified">
                    <h2 class="mdl-card__title-text">Sign Up</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form method="POST" action="register" id="register">
                        @csrf
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="first_name">
                            <label class="mdl-textfield__label" for="first_name">First Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="last_name">
                            <label class="mdl-textfield__label" for="last_name">Last Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="email">
                            <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" name="password">
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" name="password_confirmation">
                            <label class="mdl-textfield__label" for="password_confirmation">Confirm Password</label>
                        </div>
                    </form>
                </div>
                <div class="mdl-card__actions mdl-card--border center-justified">
                    <button 
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                        type="submit"
                        form="register"
                    >
                        Register
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('local_scripts')
    <script src="{{ asset('js/views/login.js') }}"></script>
@endsection
