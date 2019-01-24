@extends('layouts.app')

@section('title', 'Login')

@section('html')
    <div id="page-login" class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            {{-- Spacer --}}
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2 mq-not-tablet"></div>

            @if ($errors->any())
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="mdl-list__item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8">
                <div class="mdc-tab-bar" role="tablist">
                    <div class="mdc-tab-scroller">
                        <div class="mdc-tab-scroller__scroll-area">
                            <div class="mdc-tab-scroller__scroll-content">
                                <button id="button-tab-login" class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="0">
                                    <span class="mdc-tab__content">
                                        <i class="mdc-tab__icon fas fa-sign-in-alt" aria-hidden="true"></i>
                                        <span class="mdc-tab__text-label">Login</span>
                                    </span>
                                    <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                    <span class="mdc-tab__ripple"></span>
                                </button>

                                <button id="button-tab-register" class="mdc-tab" role="tab" tabindex="-1">
                                    <span class="mdc-tab__content">
                                        <i class="mdc-tab__icon fas fa-plus"></i>
                                        <span class="mdc-tab__text-label">Register</span>
                                    </span>
                                    <span class="mdc-tab-indicator">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                    <span class="mdc-tab__ripple"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mdc-layout-grid__inner">
            {{-- Spacer --}}
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2 mq-not-tablet"></div>

            <div id="tab-login" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8 tab">
                <form method="POST" action="login" id="login">
                    @csrf
                    {{-- Username field --}}
                    <div class="mdc-text-field mdc-text-field--outlined">
                        <input type="text" name="email" class="mdc-text-field__input">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="email" class="mdc-floating-label">Email</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    {{-- Password field --}}
                    <div class="mdc-text-field mdc-text-field--outlined">
                        <input type="password" name="password" class="mdc-text-field__input">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="password" class="mdc-floating-label">Password</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit" disabled>
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>

            <div id="tab-register" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8 tab tab--invisible">
                <form method="POST" action="login" id="register">
                    @csrf
                    {{-- Username field --}}
                    <div class="mdc-text-field mdc-text-field--outlined">
                        <input type="text" name="username" class="mdc-text-field__input">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="username" class="mdc-floating-label">Username</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    {{-- Password field --}}
                    <div class="mdc-text-field mdc-text-field--outlined">
                        <input type="password" name="password" class="mdc-text-field__input">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="password" class="mdc-floating-label">Password</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>

                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit" disabled>
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- <div id="login-grid" class="mdl-grid">

    {{-- <div class="mdl-grid">
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
    </div> --}}

@section('js')
    <script>
        const submitButtons = document.querySelectorAll('.submit');

        if (typeof grecaptcha !== 'undefined') {
            const gRecaptchaTokens = document.querySelectorAll('.g-recaptcha-token');

            grecaptcha && grecaptcha.ready(() =>
                grecaptcha
                    .execute("{{ config('recaptcha.v3_site_key') }}")
                    .then(token => {
                        gRecaptchaTokens.forEach(el => el.value = token);
                        submitButtons.forEach(button => button.disabled = false);
                    })
            );
        } else {
            submitButtons.forEach(button => button.disabled = false);
        }
    </script>
@endsection
