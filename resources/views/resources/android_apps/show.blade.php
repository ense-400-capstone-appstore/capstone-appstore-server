@extends('layouts.app')

@section('title', $androidApp->name)

@section('html')
<div id="page-android-apps-show" class="page-content page-content-android-apps">
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

            @if(Auth::user() && Auth::user()->createdAndroidApps()->pluck('id')->contains($androidApp->id))
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                    @linkbutton([
                        'id' => 'android-app-create',
                        'classes' => 'mdc-button mdc-button--outlined',
                        'href' => '/android_apps/' . $androidApp->id . '/edit'
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
                <div class="mdc-card">
                    <div class="mdc-card__media mdc-card__media--square" style="background: url('{{ '/storage/' . $androidApp->avatar }}'); background-size: cover; background-position: center;">
                    </div>


                    <div class="card-content" tabindex="0">
                        <h2 class="mdc-typography--headline3">
                            {{ $androidApp->name }}
                        </h2>

                        <h3 class="mdc-typography--headline5">
                            By {{ $androidApp->creator->name ?? 'N/A' }}
                        </h3>

                        <h4 class="mdc-typography--headline6">
                            Price
                        </h4>

                        <p class="mdc-typography--body2">
                            @if($androidApp->price == 0)
                                Free
                            @else
                                ${{ $androidApp->price }}
                            @endif
                        </p>

                        <h4 class="mdc-typography--headline6">
                            Description
                        </h4>

                        <p class="mdc-typography--body1">
                            {{ $androidApp->description }}
                        </p>
                    </div>

                    <div class="mdc-card__actions">
                        @if (Auth::user())
                             <form method="POST" action="{{ $androidApp->id }}/toggle_own/{{ Auth::user()->id }}">
                                @csrf
                                <button class="mdc-button mdc-button--raised submit" type="submit">
                                    <span class="mdc-button__label">
                                        @if(Auth::user()->androidApps()->find($androidApp->id) == null)
                                            Get this app
                                        @else
                                            Remove from owned apps
                                        @endif
                                    </span>
                                </button>
                            </form>
                        @endif

                        @if (Auth::user() && Auth::user()->hasRole('admin'))
                            <a href="{{ $androidApp->id }}/file" class="mdc-button mdc-card__action mdc-card__action--button">
                                Download File
                            </a>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
