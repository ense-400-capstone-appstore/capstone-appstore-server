<a
    {{ isset($id) ? "id=" . $id : '' }}
    class="{{ $classes ?? '' }}"
    onclick="{{ $onClick ?? '' }}"
    href="{{ $href ?? '' }}"
    target={{ $target ?? '_self' }}
    data-tippy="{{ $tooltip ?? '' }}"
>
    @if (isset($isIconButton))
        {{ $slot ?? '' }}
    @else
        <span class="mdc-button__label">
            {{ $slot ?? '' }}
        </span>
    @endif
</a>
