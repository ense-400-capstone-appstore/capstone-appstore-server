@extends('layouts.app')

@section('title', $group->name)

@section('html')
<div id="page-groups-show" class="page-content page-content-groups">
    <div class="mdc-layout-grid page-content-item">
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

            @if(Auth::user() && ($group->owner_id == Auth::user()->id || Auth::user()->isAdmin()))
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                    @linkbutton([
                        'id' => 'group-edit',
                        'classes' => 'mdc-button mdc-button--outlined',
                        'href' => '/groups/' . $group->id . '/edit'
                    ])
                        Edit
                    @endlinkbutton
                </div>
            @endif
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <div class="mdc-card group-card">
                    <div class="card-content text-center" tabindex="0">
                        <h2 class="mdc-typography--headline3">
                            {{ $group->name }}
                        </h2>

                        <h3 class="mdc-typography--headline5">
                            @if ($group->owner_id == Auth::user()->id)
                                You created this group
                            @else
                                <span>By </span>
                                <a
                                    class="block-link creator-link"
                                    href="/users/{{ $group->owner->id }}"
                                >
                                    <img
                                        class="user-menu-icon"
                                        src="/storage/{{ $group->owner->avatar }}"
                                        height="35px"
                                        width="auto"
                                        align="top"
                                    />

                                    {{ $group->owner->name ?? 'N/A' }}
                                </a>
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <h1 class="page-title mdc-typography--headline4 text-center">Android Apps</h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if ($group->androidApps->isEmpty())
                <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                    There are no apps under this group.
                </h2>
            @endif

            @foreach ($group->androidApps as $androidApp)
                @component('resources.android_apps.partials.card', [
                    'androidApp' => $androidApp
                ])
                @endcomponent
            @endforeach
        </div>
    </div>

    @if(Auth::user() && $group->owner_id == Auth::user()->id)
        <div class="mdc-layout-grid page-content-item">
            <h1 class="page-title mdc-typography--headline4 text-center">Users</h1>
        </div>

        <div class="mdc-layout-grid page-content-item">
            <div class="mdc-layout-grid__inner">
                @if ($group->users->isEmpty())
                    <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                        There are no users under this group.
                    </h2>
                @endif

                <ul class="mdc-list mdc-layout-grid__cell--span-12">
                    @foreach ($group->users as $user)
                        <li class="mdc-list-item" tabindex="0">
                            <a
                                    class="block-link user-link"
                                    href="/users/{{ $user->id }}"
                            >
                                <img
                                    class="mdc-list-item__graphic user-menu-icon"
                                    src="/storage/{{ $user->avatar }}"
                                    height="35px"
                                    width="auto"
                                    align="top"
                                />

                                <span class="mdc-list-item__text">{{ $user->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@endsection
