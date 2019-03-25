@extends('layouts.app')

@section('title', $user->name . "'s Groups")

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
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <h1 class="page-title mdc-typography--headline4 text-center">
            @if ($user->id == Auth::user()->id)
                Your Groups
            @else
                {{ $user->name . "'s Groups" }}
            @endif
        </h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @if ($groups->isEmpty())
                <h2 class="mdc-typography--headline6 text-center mdc-layout-grid__cell--span-12">
                    @if ($user->id == Auth::user()->id)
                        You are not a member of any groups.
                    @else
                        This user is not a member of any groups.
                    @endif
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
