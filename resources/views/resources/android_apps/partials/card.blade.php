<a href="/android_apps/{{ $androidApp->id }}" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
    <div class="mdc-card android_app_card {{ !$androidApp->approved ? 'android_app_not_approved' : '' }}">
        <div class="mdc-card__primary-action" tabindex="0">
            <div class="mdc-card__media mdc-card__media--square" style="background: #555 url('{{ '/storage/' . $androidApp->avatar }}'); background-size: cover;">
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
                    @if(Auth::user()->androidApps()->find($androidApp->id))
                        You own this app
                    @elseif($androidApp->price == 0)
                        Free
                    @else
                        ${{ $androidApp->price }}
                    @endif
                </p>

                @if(!$androidApp->approved)
                    <p class="mdc-typography--body2 text-center android_app_not_approved_message">
                        Please wait for an administrator to approve this app before other users can view it
                    </p>
                @endif
            </div>
        </div>
    </div>
</a>
