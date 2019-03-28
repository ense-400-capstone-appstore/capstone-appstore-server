@extends('layouts.app')

@section('title', 'Add/Remove ' . $user->name . ' From Your Groups')

@section('html')
    <div id="page-users-edit-groups" class="page-content page-content-users">
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
            <h1 class="page-title mdc-typography--headline4 text-center">
                Add/Remove {{ $user->name }} From Your Groups
            </h1>
        </div>

        <div class="mdc-layout-grid__inner page-content-item">
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

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <p class="required-warning">
                    Fields marked * are required.
                </p>
            </div>
        </div>

        <div class="mdc-layout-grid__inner page-content-item">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <form method="POST" action="/users/{{ $user->id }}/edit_groups" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Categories --}}
                    @if ($groups->isEmpty())
                        <h2 class="mdc-typography--headline6 text-center">
                            You have not created any groups.
                        </h2>
                    @else
                        <ul class="mdc-list" role="group" aria-label="List with checkbox items">
                            @foreach($groups as $group)
                                <li
                                    class="mdc-list-item"
                                    role="checkbox"
                                    aria-checked="{{ $group->users->pluck('id')->contains($user->id) ? 'true' : 'false' }}">
                                    <span class="mdc-list-item__graphic">
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox">
                                                <input type="checkbox"
                                                    class="mdc-checkbox__native-control"
                                                    id="group-{{ $group->id }}"
                                                    name="groups[]"
                                                    value="{{ $group->id }}"
                                                    {{ $group->users->pluck('id')->contains($user->id) ? 'checked' : '' }}  />
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark"
                                                        viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path"
                                                            fill="none"
                                                            d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>

                                    <label class="mdc-list-item__text" for="group-{{ $group->id }}">
                                        <b>{{ $group->name }}</b>
                                        <span> (ID: {{ $group->id }})</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit" disabled>
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
