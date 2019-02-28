@extends('layouts.app')

@section('title', 'Dashboard')

@section('html')
<div id="page-dashboard" class="page-content page-content-users">
    <h1 class="page-title mdc-typography--headline4">Dashboard</h1>

    <div class="mdc-layout-grid page-content-item">
        {{-- Get App --}}
        <div class="mdc-layout-grid__inner">
            {{-- Apps by Category --}}
            <a href="https://github.com/matryoshkadoll/matryoshka-app/releases" class="card-link mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <div class="mdc-card card-get-app">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <h2 class="mdc-typography--headline6">Get the App!</h2>
                        <p class="mdc-typography--body2">
                            To start using Matryoshka, download the app by clicking here!
                        </p>

                        <p class="mdc-typography--body2">
                            The Matryoshka app serves as an app store that allows you to install any Android application offered on Matryoshka.
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <h1 class="page-title mdc-typography--headline6">Android Apps</h1>

        <div class="mdc-layout-grid__inner">
            {{-- Apps by Category --}}
            <a href="/categories" class="card-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <h2 class="mdc-typography--headline6">Apps by Category</h2>
                        <p class="mdc-typography--body2">
                            Filter applications by searching in specific categories
                        </p>
                    </div>
                </div>
            </a>

            {{-- All Apps --}}
            <a href="/android_apps" class="card-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <h2 class="mdc-typography--headline6">All Apps</h2>
                        <p class="mdc-typography--body2">
                            View all available applications
                        </p>
                    </div>
                </div>
            </a>
        </div>

        <h1 class="page-title mdc-typography--headline6">Account</h1>

        <div class="mdc-layout-grid__inner">
            {{-- Profile --}}
            <a href="/users/{{ Auth::user()->id }}" class="card-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card mdc-card">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <h2 class="mdc-typography--headline6">Profile</h2>
                        <p class="mdc-typography--body2">
                            View and modify your public profile information
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
