<a href="/android_apps/{{ $androidApp->id }}" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-4">
    <div class="mdc-card android_app_card {{ !$androidApp->approved ? 'android_app_not_approved' : '' }}">
        <div class="mdc-card__primary-action" tabindex="0">
            <div class="mdc-card__media mdc-card__media--square" style="background: url('{{ '/storage/' . $androidApp->avatar }}'); background-size: cover;">
                <div class="mdc-card__media-content">
                    <div class="card-content">
                        <h2 class="mdc-typography--headline6">
                            {{ $androidApp->name }}
                        </h2>

                        <h3 class="mdc-typography--subtitle2">
                            @if ($androidApp->creator_id == Auth::user()->id)
                                You created this app
                            @else
                                By {{ $androidApp->creator->name ?? 'N/A' }}
                            @endif
                        </h3>
                    </div>
                </div>
            </div>

            <div class="card-content">
                @if(!isset($hidePrice))
                    <p class="mdc-typography--body2 text-right">
                        @if($androidApp->price == 0)
                            Free
                        @else
                            ${{ $androidApp->price }}
                        @endif
                    </p>
                @endif

                @if(!$androidApp->approved)
                    <p class="mdc-typography--body2 text-center android_app_not_approved_message">
                        Please wait for an administrator to approve this app before other users can view it
                    </p>
                @endif
            </div>
        </div>
    </div>
</a>
