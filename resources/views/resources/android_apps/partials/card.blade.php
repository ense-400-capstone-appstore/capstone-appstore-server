<a href="/android_apps/{{ $androidApp->id }}" class="block-link mdc-layout-grid__cell mdc-layout-grid__cell--span-4 android_app_card">
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
                @if(!isset($hidePrice))
                    <p class="mdc-typography--body2 text-right">
                        @if($androidApp->price == 0)
                            Free
                        @else
                            ${{ $androidApp->price }}
                        @endif
                    </p>
                @endif
            </div>
        </div>
    </div>
</a>
