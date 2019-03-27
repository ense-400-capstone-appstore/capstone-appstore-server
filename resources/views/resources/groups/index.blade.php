@extends('layouts.app')

@section('title', 'All Groups')

@section('html')
<div id="page-groups-index" class="page-content page-content-groups">

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
        <h1 class="page-title mdc-typography--headline4 text-center">
            All Groups
        </h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if ($groups->isEmpty())
                <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                    There are no groups available.
                </h2>
            @endif

            @foreach ($groups as $group)
                @component('resources.groups.partials.card', [
                    'group' => $group
                ])
                @endcomponent
            @endforeach
        </div>
    </div>
</div>

{{ $groups->links() }}

@endsection
