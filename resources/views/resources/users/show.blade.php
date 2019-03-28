@extends('layouts.app')

@section('title', $user->name . "'s Profile")

@section('html')
<div id="page-users-show" class="page-content page-content-users">
    <div class="mdc-layout-grid page-content-item">
        @if ($errors->any())
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 errors">
                <span>Please correct the errors below and try again:</span>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Controls --}}
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                @button([
                    'classes' => 'mdc-button mdc-button--outlined',
                    'onClick' => 'window.history.back()'
                ])
                    Back
                @endbutton
            </div>

            {{-- Divider --}}
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-10-desktop mdc-layout-grid__cell--span-6-tablet
            mdc-layout-grid__cell--span-2-phone"></div>

            @if(Auth::user() && Auth::user()->id == $user->id)
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                    @button([
                        'id' => 'user-edit',
                        'classes' => 'mdc-button mdc-button--outlined'
                    ])
                        Edit
                    @endbutton
                </div>
            @endif
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item mdc-elevation--z8 profile-container">
        {{-- Avatar --}}
        <div class="mdc-layout-grid__inner">
            <div
                class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12"
            >
                <img
                    class="mdc-button__icon user-menu-icon"
                    src="/storage/{{ $user->avatar }}"
                    height="128px"
                    width="auto"
                />

            </div>
        </div>

        {{-- Name --}}
        <div class="mdc-layout-grid__inner">
            <div
                class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12"
            >
                <h1>{{ $user->name }}</h1>
            </div>
        </div>

        {{-- Role --}}
        <div class="mdc-layout-grid__inner">
            <div
                class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12"
            >
                <div class="mdc-chip-set">
                    <div
                        class="mdc-chip"
                        tabindex="0"
                        data-tippy="Role"
                    >
                        <div class="mdc-chip__text">
                            {{ ucfirst($user->role->name) }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->isAdminOrVendor())
            <div class="mdc-card__actions">
                @linkbutton([
                    'classes' => 'mdc-button mdc-button--raised',
                    'href' => '/users/' . $user->id . '/edit_groups'
                ])
                    Add to/Remove from groups
                @endlinkbutton
            </div>
        @endif
    </div>

    @if(Auth::user() && Auth::user()->id == $user->id)
        <div class="mdc-layout-grid page-content-item mdc-elevation--z8 profile-private-container">
        {{-- Private Information --}}
            <div class="mdc-layout-grid__inner">
                <div
                    class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12"
                >
                    <h2 class="mdc-typography--headline5">Private Information</h2>
                    <h3 class="mdc-typography--subtitle2">This information is only visible to you</h3>

                    <p class="profile-private-key">Email Address</p>

                    <div class="mdc-text-field mdc-text-field--no-label mdc-text-field--disabled profile-private-value">
                        <input type="text" class="mdc-text-field__input" disabled placeholder="{{ $user->email }}">
                    </div>
                </div>
            </div>
        </div>

        @component('resources.users.edit', ['user' => $user])
        @endcomponent
    @endif

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if($user->isAdminOrVendor())
                <a href="/users/{{ $user->id }}/created_android_apps" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                    <div class="mdc-card card-button">
                        <div class="mdc-card__primary-action" tabindex="0">
                            <div class="mdc-card__media">
                                <div class="mdc-card__media-content">
                                    <div class="card-content">
                                        <h2 class="mdc-typography--headline6">Created Apps</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="card-content">
                                <p class="mdc-typography--body2">
                                    View apps {{ $user->name }} created
                                </p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/users/{{ $user->id }}/created_groups" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                    <div class="mdc-card card-button">
                        <div class="mdc-card__primary-action" tabindex="0">
                            <div class="mdc-card__media">
                                <div class="mdc-card__media-content">
                                    <div class="card-content">
                                        <h2 class="mdc-typography--headline6">Created Groups</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="card-content">
                                <p class="mdc-typography--body2">
                                    View groups {{ $user->name }} created
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>
    </div>
</div>
@endsection
