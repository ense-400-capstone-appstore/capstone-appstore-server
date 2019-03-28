<a
    href="/groups/{{ $group->id }}"
    class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet group-card">
    <div class="mdc-card group-card">
        <div class="mdc-card__primary-action" tabindex="0">
            <div class="card-content text-center">
                <h2 class="mdc-typography--headline6">
                    {{ $group->name }}
                </h2>

                <h3 class="mdc-typography--subtitle2">
                    By {{ $group->owner->name ?? 'N/A' }}
                </h3>

                @if($group->isMember(Auth::user()))
                    <h3 class="mdc-typography--body2">
                        You are a member of this group
                    </h3>
                @endif
            </div>
        </div>
    </div>
</a>
