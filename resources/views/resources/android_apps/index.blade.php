@extends('layouts.app')

@section('title', 'Android Apps')

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
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <h1 class="page-title mdc-typography--headline4 text-center">All Android Apps</h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if ($androidApps->isEmpty())
                <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                    There are no apps available.
                </h2>
            @endif

            @foreach ($androidApps as $androidApp)
                @component('resources.android_apps.partials.card', [
                    'androidApp' => $androidApp
                ])
                @endcomponent
            @endforeach
        </div>
    </div>
</div>

{{ $androidApps->links() }}

@endsection
