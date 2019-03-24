@extends('layouts.app')

@section('title', 'Dashboard')

@section('html')
<div id="page-dashboard" class="page-content page-content-users">
    <div class="mdc-layout-grid page-content-item">
        {{-- Get App --}}
        <div class="mdc-layout-grid__inner">
            <a href="https://github.com/matryoshkadoll/matryoshka-app/releases" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <div class="mdc-card card-get-app">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <div class="card-content">
                            <h2 class="mdc-typography--headline5 text-center">Get the Matryoshka App</h2>
                            <p class="mdc-typography--body2">
                                Click here to download the app and start using Matryoshka!
                            </p>

                            <p class="mdc-typography--body2">
                                The Matryoshka app serves as an app store that allows you to install any Android application offered on Matryoshka
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <h1 class="page-title mdc-typography--headline6">Discover Android Apps</h1>

        <div class="mdc-layout-grid__inner">
            {{-- All Apps --}}
            <a href="/android_apps" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card card-button">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <div class="mdc-card__media">
                            <div class="mdc-card__media-content">
                                <div class="card-content">
                                    <h2 class="mdc-typography--headline6">All Apps</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <p class="mdc-typography--body2">
                                View all available apps
                            </p>
                        </div>
                    </div>
                </div>
            </a>

            {{-- Apps by Category --}}
            <a href="/categories" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card card-button">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <div class="mdc-card__media">
                            <div class="mdc-card__media-content">
                                <div class="card-content">
                                    <h2 class="mdc-typography--headline6">Apps by Category</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <p class="mdc-typography--body2">
                                Filter apps by searching in specific categories
                            </p>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        <h1 class="page-title mdc-typography--headline6">Your Account</h1>

        <div class="mdc-layout-grid__inner">
            {{-- Profile --}}
            <a href="/users/{{ Auth::user()->id }}" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card card-button">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <div class="mdc-card__media">
                            <div class="mdc-card__media-content">
                                <div class="card-content">
                                    <h2 class="mdc-typography--headline6">Profile</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <p class="mdc-typography--body2">
                                View and modify your public profile information
                            </p>
                        </div>
                    </div>
                </div>
            </a>

            {{-- Your Apps --}}
            <a href="/users/{{ Auth::user()->id }}/android_apps" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                <div class="mdc-card card-button">
                    <div class="mdc-card__primary-action" tabindex="0">
                        <div class="mdc-card__media">
                            <div class="mdc-card__media-content">
                                <div class="card-content">
                                    <h2 class="mdc-typography--headline6">Your Apps</h2>
                                </div>
                            </div>
                        </div>

                        <div class="card-content">
                            <p class="mdc-typography--body2">
                                Manage apps you purchased or installed
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        {{-- Vendor Settings --}}
        @if(Auth::user()->isAdminOrVendor())
            <h1 class="page-title mdc-typography--headline6">Vendor Settings</h1>

            <p class="mdc-typography--body2 text-center">
                (this section is only available to Vendors)
            </p>

            <div class="mdc-layout-grid__inner">
                {{-- Add an App --}}
                <a href="/android_apps/create" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                    <div class="mdc-card card-button">
                        <div class="mdc-card__primary-action" tabindex="0">
                            <div class="mdc-card__media">
                                <div class="mdc-card__media-content">
                                    <div class="card-content">
                                        <h2 class="mdc-typography--headline6">Add an App</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="card-content">
                                <p class="mdc-typography--body2">
                                    Host a new app for users to purchase
                                </p>
                            </div>
                        </div>
                    </div>
                </a>

                {{-- Your Apps --}}
                <a href="/users/{{ Auth::user()->id }}/created_android_apps" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                    <div class="mdc-card card-button">
                        <div class="mdc-card__primary-action" tabindex="0">
                            <div class="mdc-card__media">
                                <div class="mdc-card__media-content">
                                    <div class="card-content">
                                        <h2 class="mdc-typography--headline6">Your Created Apps</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="card-content">
                                <p class="mdc-typography--body2">
                                    Manage apps you created
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        {{-- System Administration --}}
        @if(Auth::user()->isAdmin())
            <h1 class="page-title mdc-typography--headline6">System Administration</h1>

            <p class="mdc-typography--body2 text-center">
                (this section is only available to Administrators)
            </p>

            <div class="mdc-layout-grid__inner">
                <a href="/admin" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                    <div class="mdc-card card-admin">
                        <div class="mdc-card__primary-action" tabindex="0">
                            <div class="card-content">
                                <h2 class="mdc-typography--headline6">Administrator Panel</h2>

                                <p class="mdc-typography--body2">
                                    Click here to manage Matryoshka settings and data through the administrator panel
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
