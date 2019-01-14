<a
    {{ isset($id) ? "id=" . $id : '' }}
    class="{{ $classes ?? '' }}"
    onclick="{{ $onClick ?? '' }}"
    href="{{ $href ?? '' }}"
    data-tippy="{{ $tooltip ?? '' }}"
    data-tippy-arrow="true"
>
    @if (isset($isIconButton))
        {{ $slot ?? '' }}
    @else
        <span class="mdc-button__label">
            {{ $slot ?? '' }}
        </span>
    @endif
</a>
