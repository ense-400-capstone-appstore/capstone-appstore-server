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

            @if(Auth::user() && !Auth::user()->hasRole('user'))
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                    @button([
                        'id' => 'android-app-create',
                        'classes' => 'mdc-button mdc-button--outlined'
                    ])
                        Create New
                    @endbutton
                </div>
            @endif
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @foreach ($androidApps as $androidApp)
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

{{ $androidApps->links() }}

@endsection
