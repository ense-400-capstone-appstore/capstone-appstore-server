<a href="/groups/{{ $group->id }}" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 group-card">
    <div class="mdc-card group-card">
        <div class="mdc-card__primary-action" tabindex="0">
            <div class="card-content text-center">
                <h2 class="mdc-typography--headline6">
                    {{ $group->name }}
                </h2>

                <h3 class="mdc-typography--subtitle2">
                    @if ($group->owner_id == Auth::user()->id)
                        You own this group
                    @else
                        By {{ $group->owner->name ?? 'N/A' }}
                    @endif
                </h3>
            </div>
        </div>
    </div>
</a>
