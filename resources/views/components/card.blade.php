<div
    class="mdc-card {{ isset($isTextCard) ? 'mdc-custom-card-text' : ''}}"
>
    {{ $slot ?? '' }}
</div>
