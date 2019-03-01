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
        <h1 class="page-title mdc-typography--headline6 text-center">{{ $category->name }}</h1>
    </div>
</div>

@endsection
