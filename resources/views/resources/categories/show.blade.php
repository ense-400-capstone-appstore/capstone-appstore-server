@extends('layouts.app')

@section('title', $category->name)

@section('html')
<div id="page-categories-show" class="page-content page-content-categories">

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
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="text-center">
            <i class="category-icon material-icons rounded-icon">{{ $category->icon ?? 'folder' }}</i>
        </div>

        <h1 class="page-title mdc-typography--headline4 text-center">
            Category: {{ $category->name }}
        </h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if ($androidApps->isEmpty())
                <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                    There are no apps under this category.
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
