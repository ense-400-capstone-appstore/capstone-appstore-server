@extends('layouts.app')

@section('title', $user->name . "'s Created Apps")

@section('html')
<div id="page-android-apps-index" class="page-content page-content-android-apps">

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
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-9-desktop mdc-layout-grid__cell--span-5-tablet
            mdc-layout-grid__cell--span-1-phone"></div>

            @if(Auth::user() && !Auth::user()->hasRole('user') && Auth::user()->id == $user->id)
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                    @linkbutton([
                        'id' => 'android-app-create',
                        'classes' => 'mdc-button mdc-button--outlined',
                        'href' => '/android_apps/create'
                    ])
                        Create New
                    @endlinkbutton
                </div>
            @endif
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <h1 class="page-title mdc-typography--headline4 text-center">
            @if ($user->id == Auth::user()->id)
                Your Created Apps
            @else
                {{ $user->name }}'s Created Apps
            @endif
        </h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if ($androidApps->isEmpty())
                <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                    @if ($user->id == Auth::user()->id)
                        You did not create any apps.
                    @else
                        This user did not create any apps.
                    @endif
                </h2>
            @endif

            @foreach ($androidApps as $androidApp)
                @component('resources.android_apps.partials.card', [
                    'androidApp' => $androidApp
                ])
                @endcomponent
            @endforeach

            <div class="mdc-layout-grid__cell--span-12 model-links">
                {{ $androidApps->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
