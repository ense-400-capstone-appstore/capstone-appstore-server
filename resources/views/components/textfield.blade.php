<div class="mdc-text-field">
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        class="mdc-text-field__input"
        {{ $required ? 'required' : '' }}
    >
    <label class="mdc-floating-label" for="{{ $name }}">{{ $slot ?? '' }}</label>
    <div class="mdc-line-ripple"></div>
</div>
