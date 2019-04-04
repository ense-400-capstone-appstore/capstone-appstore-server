@extends('layouts.app')

@section('title', 'Categories')

@section('html')
<div id="page-categories-index" class="page-content page-content-categories">

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
        <h1 class="page-title mdc-typography--headline4 text-center">Categories</h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-12">
                <ul class="mdc-list">
                    @if ($categories->isEmpty())
                        <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                            There are no categories available.
                        </h2>
                    @endif

                     @foreach ($categories as $category)
                        <a href="/categories/{{ $category->id }}" class="block-link">
                            <li class="mdc-list-item" tabindex="0">
                                <span class="mdc-list-item__graphic material-icons" aria-hidden="true">{{ $category->icon ?? 'folder' }}</span>

                                <span class="mdc-list-item__text">{{ $category->name }}</span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>

            <div class="mdc-layout-grid__cell--span-12 model-links">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
