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

            @if(Auth::user() && ($androidApp->creator_id == Auth::user()->id || Auth::user()->isAdmin()))
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
                @if ($errors->any())
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 errors">
                        <span>Please correct the errors below and try again:</span>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="error">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mdc-card android_app_card {{ !$androidApp->approved ? 'android_app_not_approved' : '' }}">
                    <div class="mdc-card__media mdc-card__media--square" style="background: #555 url('{{ '/storage/' . $androidApp->avatar }}'); background-size: cover; background-position: center;">
                    </div>


                    <div class="card-content" tabindex="0">
                        <h2 class="mdc-typography--headline3">
                            {{ $androidApp->name }}
                        </h2>

                        <h3 class="mdc-typography--headline5">
                            <span>By </span>

                            <a
                                class="block-link creator-link"
                                href="/users/{{ $androidApp->creator->id }}"
                            >
                                <img
                                    class="mdc-button__icon user-menu-icon"
                                    src="/storage/{{ $androidApp->creator->avatar }}"
                                    height="35px"
                                    width="auto"
                                    align="top"
                                />

                                {{ $androidApp->creator->name ?? 'N/A' }}
                            </a>
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

                        @if(!$androidApp->categories->isEmpty())
                            <h4 class="mdc-typography--headline6">
                                Categories
                            </h4>

                            <div class="mdc-chip-set">
                                @foreach($androidApp->categories as $category)
                                    <a class="block-link" href="/categories/{{ $category->id }}">
                                        <div class="mdc-chip">
                                            <i class="material-icons mdc-chip__icon mdc-chip__icon--leading">{{ $category->icon ?? 'folder' }}</i>
                                            <div class="mdc-chip__text">
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        @if(!$androidApp->approved)
                            <p class="mdc-typography--body2 text-center android_app_not_approved_message">
                                Please wait for an administrator to approve this app before other users can view it
                            </p>
                        @endif
                    </div>

                    @if($androidApp->approved)
                        <div class="mdc-card__actions">
                            @if (!$androidApp->price)
                                <form method="POST" action="/android_apps/{{ $androidApp->id }}/toggle_own/{{ Auth::user()->id }}">
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
                                <a
                                    href="{{ $androidApp->id }}/file"
                                    class="mdc-button mdc-card__action mdc-card__action--button"
                                    data-tippy="Only available to admins">
                                    Download File
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
