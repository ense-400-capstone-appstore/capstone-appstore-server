<div class="mdc-text-field {{ $classes ?? '' }}">
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        class="mdc-text-field__input"
        {{ isset($required) && $required == 'true' ? 'required' : '' }}
        value="{{ isset($value) ? $value : '' }}"
    >
    <label class="mdc-floating-label" for="{{ $name }}">{{ $slot ?? '' }}</label>
    <div class="mdc-line-ripple"></div>
</div>
