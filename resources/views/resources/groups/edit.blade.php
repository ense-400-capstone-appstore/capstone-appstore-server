@extends('layouts.app')

@section('title', 'Editing Group: ' . $group->name)

@section('html')
    <div id="page-groups-edit" class="page-content page-content-groups">
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
            <h1 class="page-title mdc-typography--headline4 text-center">Editing Group: {{ $group->name }}</h1>
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
                <form method="POST" action="/groups/{{ $group->id }}" enctype="multipart/form-data">
                    @method("patch")
                    @csrf
                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Name --}}
                    @textfield([
                        "name" => "name",
                        "required" => true,
                        "value" => $group->name
                    ])
                        Name
                    @endtextfield

                    {{-- Private --}}
                    <div class="mdc-form-field">
                        <div class="mdc-checkbox">
                            <input type="checkbox"
                                class="mdc-checkbox__native-control"
                                id="private"
                                name="private"
                                value="1"
                                {{ $group->private ? 'checked' : '' }}
                            />
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
                        <label for="private">Private? (Not shown in "all groups" listing. Only you will be able to add members)</label>
                    </div>

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit" disabled>
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
