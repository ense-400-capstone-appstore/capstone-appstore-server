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
        <h1 class="page-title mdc-typography--headline4 text-center">{{ $category->name }}</h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if ($category->androidApps->isEmpty())
                <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                    There are no apps under this category.
                </h2>
            @endif

            @foreach ($category->androidApps->all() as $androidApp)
                <a href="/android_apps/{{ $androidApp->id }}" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
                    <div class="mdc-card">
                        <div class="mdc-card__primary-action" tabindex="0">
                            <div class="mdc-card__media mdc-card__media--square" style="background: url('{{ '/storage/' . $androidApp->avatar }}'); background-size: cover;">
                                <div class="mdc-card__media-content">
                                    <div class="card-content">
                                        <h2 class="mdc-typography--headline6">
                                            {{ $androidApp->name }}
                                        </h2>

                                        <h3 class="mdc-typography--subtitle2">
                                            By {{ $androidApp->creator->name ?? 'N/A' }}
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="card-content">
                                <p class="mdc-typography--body2 text-right">
                                    @if($androidApp->price == 0)
                                        Free
                                    @else
                                        ${{ $androidApp->price }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

@endsection
