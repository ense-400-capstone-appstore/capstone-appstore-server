@extends('layouts.app')

@section('title', 'Login')

@section('local_scripts')
    <style>
        .mdl-grid {
            margin-top: 65px;
        }
    </style>
@endsection

@section('content')
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col mdl-typography--text-center">
            <h1 class="mdl-card__title-text center-justified app-title">Login</h1>

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

            <button 
                class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                type="submit"
                form="login"
            >
                Submit
            </button>
        </div>
    </div>
@endsection
